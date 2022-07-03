<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator as IdGenerator;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $members = DB::table('users')
            ->get();
        $owners = DB::table('view_gym_owners')
        ->get();
        
        return view('admin.dashboard')
        ->with('members',  $members)
        ->with('owners',  $owners);
    }

    public function gyms()
    {

        $gyms = DB::table('view_gyms')
            ->get();

        
        return view('admin.gyms')
        ->with('gyms',  $gyms);
    }

    public function plans()
    {

        $plans = DB::table('view_plans')
            ->get();

        
        return view('admin.plans')
        ->with('plans',  $plans);
    }

    public function locations()
    {

        $locations = DB::table('locations')
            ->get();

        
        return view('admin.locations')
        ->with('locations',  $locations);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        
        return redirect('admin/dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function admin_change_password_ui()
    {
        return view('admin.change_password');
    }

    public function admin_change_password(Request $request)
    {
        
        $request->validate([
            'old_password' => ['required', 'string', ],
            'new_password' => ['required','min:8', 'string', 'confirmed'],
        ]);

      if(!Hash::check($request->old_password,auth()->guard('admin')->user()->password))
      {
          return back()->with("error", "Current Password is incorrect.");
      }

        

        Admin::whereId(auth()->guard('admin')->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with("success", "Password updated successfully.");

    }

    public function delete_member($MEMBER_ID)
    {
        $member_to_delete = DB::table('member_details')->where('MEMBER_ID', $MEMBER_ID)->delete();
        $user_to_delete = DB::table('users')->where('MEMBER_ID', $MEMBER_ID)->delete();


        return redirect('/admin/dashboard');
    }

    public function delete_owner($MEMBER_ID)
    {

        $owner_to_delete = DB::table('view_gym_owners')->where('MEMBER_ID', $MEMBER_ID)->first();

        //delete owner
        $delete_owner = DB::table('staff')->where('MEMBER_ID', $MEMBER_ID)->delete();

        //delete gym
        $gym_to_delete = DB::table('gym_lists')->where('GYM_ID', $owner_to_delete->GYM_ID)->delete();

        //delete all members
        $members_to_delete = DB::table('member_details')->where('GYM_ID', $owner_to_delete->GYM_ID)->delete();

        //delete plans
        $plans_to_delete = DB::table('plans')->where('GYM_ID', $owner_to_delete->GYM_ID)->delete();

        return redirect('/admin/dashboard');
    }

    public function delete_gym($GYM_ID)
    {

        $gym_to_delete = DB::table('view_gyms')->where('GYM_ID', $GYM_ID)->first();

        // delete gym
        $delete_gym = DB::table('gym_lists')->where('GYM_ID', $gym_to_delete->GYM_ID)->delete();

        // delete all members
        $members_to_delete = DB::table('member_details')->where('GYM_ID', $gym_to_delete->GYM_ID)->delete();

        // delete plans
        $plans_to_delete = DB::table('plans')->where('GYM_ID', $gym_to_delete->GYM_ID)->delete();


        return redirect('/admin/gyms');
    }

    public function delete_plan($PLAN_ID)
    {

        $plan_to_delete = DB::table('view_plans')->where('PLAN_ID', $PLAN_ID)->first();
        // delete plan
        $delete_plan = DB::table('plans')->where('PLAN_ID', $PLAN_ID)->delete();

        // delete all members registered to plan
        $members_to_delete = DB::table('member_details')->where('PLAN_ID', $PLAN_ID)->delete();


        return redirect('/admin/plans');
    }

    public function delete_location($LOCATION_ID)
    {

        $location_to_delete = DB::table('locations')->where('LOCATION_ID', $LOCATION_ID)->first();
        // delete location
        $delete_location = DB::table('locations')->where('LOCATION_ID', $LOCATION_ID)->delete();

        // delete gyms


        return redirect('/admin/plans');
    }

    public function create_location(Request $request)
    {

        $request->validate([
            'LOCATION_NAME' => ['required', 'string', 'max:255'],
        ]);

        $config=['table'=>'locations','length'=>10,'prefix'=>'LOC-', 'field' => 'LOCATION_ID'];
        $id = IdGenerator::generate($config);

        DB::table('locations')->insert(
            [
            'LOCATION_ID' => $id,
             'LOCATION_NAME' => $request->LOCATION_NAME, 

             
             'created_at' => now(), 
             'updated_at' => now()]
        );


        return redirect('/admin/locations');
    }
}
