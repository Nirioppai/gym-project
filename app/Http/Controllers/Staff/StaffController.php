<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use App\Http\Requests\GymCreateRequest;
use App\Http\Requests\PlanCreateRequest;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


use Haruncpi\LaravelIdGenerator\IdGenerator as IdGenerator;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     public function getGym(){
        $staffID = auth()->guard('staff')->user()->MEMBER_ID;

        $staffGym = DB::table('gym_lists')
            ->where('GYM_OWNER', $staffID)
            ->first();

            return $staffGym;
    }

    public function getPlan(){
        $staffGym = $this->getGym();

        $gym_plans = DB::table('plans')
            ->where('GYM_ID', $staffGym->GYM_ID)
            ->where('PLAN_STATUS', 'Active')
            ->get();

        return $gym_plans;
    }

    public function index()
    {
        $staffGym = $this->getGym();

            return view('staff.dashboard', ['staffGym' => $staffGym]);
    }

    public function members_get()
    {
        $staffGym = $this->getGym();

        return view('staff.members', ['staffGym' => $staffGym]);
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

        $config=['table'=>'staff','length'=>10,'prefix'=>'GO-', 'field' => 'MEMBER_ID'];
        $id = IdGenerator::generate($config);

        DB::table('staff')->insert(
            ['MEMBER_ID' => $id, 'name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password),'created_at' => now(), 'updated_at' => now()]
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
        $image = $request->file('GYM_IMAGE')->store('public/gym_images');
        $staffID = auth()->guard('staff')->user()->MEMBER_ID;

        $config=['table'=>'gym_lists','length'=>10,'prefix'=>'GYM-', 'field' => 'GYM_ID'];
        $id = IdGenerator::generate($config);

        DB::table('gym_lists')->insert(
            ['GYM_ID' => $id, 
             'GYM_NAME' => $request->GYM_NAME,
             'GYM_OWNER' => $staffID,
             'GYM_LOCATION' => $request->GYM_LOCATION, 
             'GYM_IMAGE' => $request->GYM_IMAGE->hashName(), 
             'GYM_DETAILS' => $request->GYM_DETAILS, 
             'created_at' => now(), 
             'updated_at' => now()]
        );

        return redirect('staff/dashboard');

    }

    public function plan_create(PlanCreateRequest $request)
    {

        $staffGym = $this->getGym();

        $config=['table'=>'plans','length'=>10,'prefix'=>'PLAN-', 'field' => 'PLAN_ID'];
        $id = IdGenerator::generate($config);

        DB::table('plans')->insert(
            ['PLAN_ID' => $id, 
             'PLAN_NAME' => $request->PLAN_NAME,
             'PLAN_DESCRIPTION' => $request->PLAN_DESCRIPTION,
             'PLAN_VALIDITY' => $request->PLAN_VALIDITY, 
             'PLAN_AMOUNT' => $request->PLAN_AMOUNT, 
             'PLAN_STATUS' => 'Active', 
             'GYM_ID' => $staffGym->GYM_ID, 
             'created_at' => now(), 
             'updated_at' => now()]
        );



        return redirect('/staff/plan-management');
    }
}
