<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\GymCreateRequest;
use App\Http\Requests\PlanCreateRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Staff;


use Haruncpi\LaravelIdGenerator\IdGenerator as IdGenerator;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getGym(){
        $staffID = auth()->guard('staff')->user()->member_id;

        $staffGym = DB::table('gym_lists')
            ->where('gym_owner', $staffID)
            ->first();

            return $staffGym;
    }

    public function getPlan(){
        $staffGym = $this->getGym();

        $gym_plans = DB::table('plans')
            ->where('gym_id', $staffGym->gym_id)
            ->where('plan_status', 'Active')
            ->get();

        return $gym_plans;
    }

    public function index()
    {
        $staffGym = $this->getGym();


        if($staffGym){
            $activeMembers = DB::table('view_plan_list')
            ->where('gym_id', $staffGym->gym_id)
            ->where('member_status', 'Active')
            ->count();
    
            $pendingMembers = DB::table('view_plan_list')
            ->where('gym_id', $staffGym->gym_id)
            ->whereNot(function ($query) {
                $query->where('member_status', 'Active');
            })
            ->count();
        }

        if(!$staffGym){
            $activeMembers = 0;
    
            $pendingMembers = 0;
        }

            return view('staff.dashboard')
            ->with('staffGym',  $staffGym)
            ->with('activeMembers', $activeMembers)
            ->with('pendingMembers', $pendingMembers);
    }

    public function members_get()
    {
        $staffGym = $this->getGym();

        $activeMembers = DB::table('view_plan_list')
        ->where('gym_id', $staffGym->gym_id)
        ->where('member_status', 'Active')
        ->get();

        $pendingMembers = DB::table('view_plan_list')
        ->where('gym_id', $staffGym->gym_id)
        ->whereNot(function ($query) {
            $query->where('member_status', 'Active');
        })
        ->get();
        
        $gym_plans = $this->getPlan();
        

        return view('staff.members')
            ->with('staffGym',  $staffGym)
            ->with('activeMembers', $activeMembers)
            ->with('pendingMembers', $pendingMembers)
            ->with('gym_plans', $gym_plans);
    }

    public function gym_management_get()
    {

        $staffGym = $this->getGym();

        return view('staff.gym_management', ['staffGym' => $staffGym]);
    }

    public function plan_management_get()
    {
        $staffGym = $this->getGym();

        $gym_plans = $this->getPlan();
    
        return view('staff.plan_management', ['staffGym' => $staffGym], ['gym_plans' => $gym_plans]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('staff.staff.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:staff'],
        ]);

        $config=['table'=>'staff','length'=>10,'prefix'=>'GO-', 'field' => 'member_id'];
        $id = IdGenerator::generate($config);

        DB::table('staff')->insert(
            ['member_id' => $id, 'name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password),'created_at' => now(), 'updated_at' => now()]
        );
        
        return redirect('staff/dashboard');
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

    public function gym_create(GymCreateRequest $request)
    {
        $image = $request->file('gym_image')->store('public/gym_images');
        $staffID = auth()->guard('staff')->user()->member_id;

        $config=['table'=>'gym_lists','length'=>10,'prefix'=>'GYM-', 'field' => 'gym_id'];
        $id = IdGenerator::generate($config);

        DB::table('gym_lists')->insert(
            ['gym_id' => $id, 
             'gym_name' => $request->gym_name,
             'gym_owner' => $staffID,
             'gym_location' => $request->gym_location, 
             'gym_image' => $request->gym_image->hashName(), 
             'gym_details' => $request->gym_details, 
             'created_at' => now(), 
             'updated_at' => now()]
        );

        return redirect('staff/dashboard');

    }

    public function gym_update(GymCreateRequest $request)
    {
        // $image = $request->file('gym_image')->store('public/gym_images');
        // $staffID = auth()->guard('staff')->user()->member_id;

        // $config=['table'=>'gym_lists','length'=>10,'prefix'=>'GYM-', 'field' => 'gym_id'];
        // $id = IdGenerator::generate($config);

        // DB::table('gym_lists')->insert(
        //     ['gym_id' => $id, 
        //      'gym_name' => $request->gym_name,
        //      'gym_owner' => $staffID,
        //      'gym_location' => $request->gym_location, 
        //      'gym_image' => $request->gym_image->hashName(), 
        //      'gym_details' => $request->gym_details, 
        //      'created_at' => now(), 
        //      'updated_at' => now()]
        // );

        // return redirect('staff/dashboard');



        if ($request->hasFile('gym_image')) {
            $image = $request->file('gym_image')->store('public/gym_images');
            $affected = DB::table('gym_lists')
        ->where('gym_id', $request->gym_id)
        ->update([
        'gym_name' =>  $request->gym_name, 
        'gym_location' =>  $request->gym_location,
        'gym_image' => $request->gym_image->hashName(), 
        'gym_details' =>  $request->gym_details]);
        }

        if (!$request->hasFile('gym_image')) {
            $affected = DB::table('gym_lists')
            ->where('gym_id', $request->gym_id)
            ->update([
            'gym_name' =>  $request->gym_name, 
            'gym_location' =>  $request->gym_location,
            'gym_details' =>  $request->gym_details]);
        }
  

        return redirect('/staff/gym-management');

    }

    public function staff_change_password_ui()
    {
        $staffGym = $this->getGym();

        return view('staff.change_password', ['staffGym' => $staffGym])
            ->with('staffGym',  $staffGym);
    }

    public function staff_change_password(Request $request)
    {
        $staffGym = $this->getGym();
        
        $request->validate([
            'old_password' => ['required', 'string', ],
            'new_password' => ['required','min:8', 'string', 'confirmed'],
        ]);

      if(!Hash::check($request->old_password,auth()->guard('staff')->user()->password))
      {
          return back()->with("error", "Current Password is incorrect.");
      }

        

        Staff::whereId(auth()->guard('staff')->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with("success", "Password updated successfully.");

    }

    public function plan_create(PlanCreateRequest $request)
    {

        $staffGym = $this->getGym();

        $config=['table'=>'plans','length'=>10,'prefix'=>'PLAN-', 'field' => 'plan_id'];
        $id = IdGenerator::generate($config);

        DB::table('plans')->insert(
            ['plan_id' => $id, 
             'plan_name' => $request->plan_name,
             'plan_description' => $request->plan_description,
             'plan_validity' => $request->plan_validity, 
             'plan_amount' => $request->plan_amount, 
             'plan_status' => 'Active', 
             'gym_id' => $staffGym->gym_id, 
             'created_at' => now(), 
             'updated_at' => now()]
        );
        return redirect('/staff/plan-management');
    }
}
