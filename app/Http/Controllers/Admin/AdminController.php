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

    public function delete_member($member_id)
    {
        $member_to_delete = DB::table('member_details')->where('member_id', $member_id)->delete();
        $user_to_delete = DB::table('users')->where('member_id', $member_id)->delete();


        return redirect('/admin/dashboard');
    }

    public function delete_owner($member_id)
    {

        $owner_to_delete = DB::table('view_gym_owners')->where('member_id', $member_id)->first();

        //delete owner
        $delete_owner = DB::table('staff')->where('member_id', $member_id)->delete();

        //delete gym
        $gym_to_delete = DB::table('gym_lists')->where('gym_id', $owner_to_delete->gym_id)->delete();

        //delete all members
        $members_to_delete = DB::table('member_details')->where('gym_id', $owner_to_delete->gym_id)->delete();

        //delete plans
        $plans_to_delete = DB::table('plans')->where('gym_id', $owner_to_delete->gym_id)->delete();

        return redirect('/admin/dashboard');
    }

    public function delete_gym($gym_id)
    {

        $gym_to_delete = DB::table('view_gyms')->where('gym_id', $gym_id)->first();

        // delete gym
        $delete_gym = DB::table('gym_lists')->where('gym_id', $gym_to_delete->gym_id)->delete();

        // delete all members
        $members_to_delete = DB::table('member_details')->where('gym_id', $gym_to_delete->gym_id)->delete();

        // delete plans
        $plans_to_delete = DB::table('plans')->where('gym_id', $gym_to_delete->gym_id)->delete();


        return redirect('/admin/gyms');
    }

    public function delete_plan($plan_id)
    {

        $plan_to_delete = DB::table('view_plans')->where('plan_id', $plan_id)->first();
        // delete plan
        $delete_plan = DB::table('plans')->where('plan_id', $plan_id)->delete();

        // delete all members registered to plan
        $members_to_delete = DB::table('member_details')->where('plan_id', $plan_id)->delete();


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
