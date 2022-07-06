<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator as IdGenerator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class GymController extends Controller
{

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('register-gym');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }



    public function getPlan($plan_id){

        $gym_plan = DB::table('plans')
            ->where('plan_id', $plan_id)
            ->first();

        return $gym_plan;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $previous_request = $request->all();
        $gym_plan = DB::table('plans')
        ->where('plan_id',  $previous_request['plan_id'])
        ->first();

        $plan_id = $previous_request['plan_id'];
        $member_adddress = $previous_request['member_address'];
        $member_date_of_birth = $previous_request['member_date_of_birth'];
        $member_payment = $previous_request['member_payment'];

        if($plan_id == null)
        {
            return view('register-gym')->with('error', 'Please select a plan');
        }

        if($member_adddress == null)
        {
            return view('register-gym')->with('error', 'Please enter your address');
        }
        if($member_date_of_birth == null)
        {
            return view('register-gym')->with('error', 'Please enter your date of birth');
        }
        if($member_payment == null)
        {
            return view('register-gym')->with('error', 'Please enter Payment Method');
        }

        if($request->member_payment =='Gcash')
        {
            return view('payment-gcash', ['previous_request' => $previous_request], ['gym_plan' => $gym_plan]);
        }

        if($request->member_payment =='Paymaya')
        {
            return view('payment-paymaya', ['previous_request' => $previous_request], ['gym_plan' => $gym_plan]);
        }
    }

    public function gyms()
    {

        $gyms = DB::table('gym_lists')->get();
        
        return view('gyms')->with('gyms',  $gyms);
    }

    public function store_member_details(Request $request)
    {
        $config=['table'=>'member_details','length'=>10,'prefix'=>'PAY-', 'field' => 'payment_id'];
        $id = IdGenerator::generate($config);
        $newDateTime = Carbon::now()->addDays($request->plan_validity);
        
        DB::table('member_details')->insert(
            ['member_id' => Auth::user()->member_id, 
             'member_expiry_date' => $newDateTime, // remove this 
             'member_address' => $request->member_address, 
             'member_gender' => $request->member_gender, 
             'member_date_of_birth' => $request->member_date_of_birth, 
             'member_phone_number' => $request->member_phone_number, 
             'member_status' => 'Pending', 
             'gym_id' => $request->gym_id, 
             'member_payment' => $request->member_payment, 
             'plan_amount' => $request->plan_amount,
             'plan_id' => $request->plan_id, 
             'payment_id' => $id,
             'created_at' => now(), 
             'updated_at' => now()]
        );

        return redirect('/dashboard');
    }

    public function edit_member(Request $request)
    {
        $affected = DB::table('member_details')
              ->where('member_id', $request->member_id)
              ->update([
              'member_address' =>  $request->member_address, 
              'member_gender' =>  $request->member_gender,
              'member_date_of_birth' =>  $request->member_date_of_birth,
              'member_phone_number' =>  $request->member_phone_number,
              'health_height' =>  $request->health_height,
              'health_weight' =>  $request->health_weight,
              'health_waist' =>  $request->health_waist,
              'health_remarks' =>  $request->health_remarks]);

            return redirect('/staff/members');
        
    }
        

    public function create_member(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $config=['table'=>'users','length'=>10,'prefix'=>'GM-', 'field' => 'member_id'];
        $id = IdGenerator::generate($config);
        $gym_plan = $this->getPlan($request->plan_id);

        if($gym_plan)
        {
            DB::table('users')->insert(
                ['member_id' => $id, 'name' => $request->name, 'email' => $request->email, 'password' => Hash::make('password'),'created_at' => now(), 'updated_at' => now()]
            );
    
            $config2=['table'=>'member_details','length'=>10,'prefix'=>'PAY-', 'field' => 'payment_id'];
            $id2 = IdGenerator::generate($config2);
            $newDateTime = Carbon::now()->addDays($gym_plan->plan_validity);
    
            
    
            DB::table('member_details')->insert(
                ['member_id' =>$id, 
                 'member_expiry_date' => $newDateTime, // remove this 
                 'member_address' => $request->member_address, 
                 'member_gender' => $request->member_gender, 
                 'member_date_of_birth' => $request->member_date_of_birth, 
                 'member_phone_number' => $request->member_phone_number, 
                 'member_status' => 'Active', 
                 'gym_id' =>$gym_plan->gym_id, 
                 'member_payment' => 'Cash', 
                 'plan_amount' =>$gym_plan->plan_amount,
                 'plan_id' => $request->plan_id, 
                 'payment_id' => $id2,
                 'created_at' => now(), 
                 'updated_at' => now()]
            );

        }     

        return redirect('/staff/members');
    }

    public function activate_member(Request $request)
    {

        $affected = DB::table('member_details')
              ->where('payment_id', $request->member_payment_id)
              ->update(['member_status' => 'Active']);


        return redirect('/staff/members');
    }

    public function edit_plan(Request $request)
    {

        
        $affected = DB::table('plans')
              ->where('plan_id', $request->PLAN_ID_EDIT)
              ->update([
              'plan_name' =>  $request->PLAN_NAME_EDIT, 
              'plan_description' =>  $request->PLAN_DESCRIPTION_EDIT,
              'plan_validity' =>  $request->PLAN_VALIDITY_EDIT,
              'plan_amount' =>  $request->PLAN_AMOUNT_EDIT]);
              

        return redirect('/staff/plan-management');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $gym = DB::table('gym_lists')
            ->where('gym_id', $id)
            ->first();

        $gym_plans = DB::table('plans')
            ->where('gym_id', $id)
            ->where('plan_status', 'Active')
            ->get();

        return view('register-gym', ['gym' => $gym], ['gym_plans' => $gym_plans]);
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

    public function delete_plan($plan_id)
    {
        $plan_to_delete = DB::table('plans')->where('plan_id', $plan_id)->delete();
        return redirect('/staff/plan-management');
    }


}
