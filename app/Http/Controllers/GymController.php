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
            ->where('PLAN_ID', $plan_id)
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
        ->where('PLAN_ID',  $previous_request['PLAN_ID'])
        ->first();

        $plan_id = $previous_request['PLAN_ID'];
        $member_adddress = $previous_request['MEMBER_ADDRESS'];
        $member_date_of_birth = $previous_request['MEMBER_DATE_OF_BIRTH'];
        $member_payment = $previous_request['MEMBER_PAYMENT'];

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

        if($request->MEMBER_PAYMENT =='Gcash')
        {
            return view('payment-gcash', ['previous_request' => $previous_request], ['gym_plan' => $gym_plan]);
        }

        if($request->MEMBER_PAYMENT =='Paymaya')
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
        $config=['table'=>'member_details','length'=>10,'prefix'=>'PAY-', 'field' => 'PAYMENT_ID'];
        $id = IdGenerator::generate($config);
        $newDateTime = Carbon::now()->addDays($request->PLAN_VALIDITY);
        
        DB::table('member_details')->insert(
            ['MEMBER_ID' => Auth::user()->MEMBER_ID, 
             'MEMBER_EXPIRY_DATE' => $newDateTime, // remove this 
             'MEMBER_ADDRESS' => $request->MEMBER_ADDRESS, 
             'MEMBER_GENDER' => $request->MEMBER_GENDER, 
             'MEMBER_DATE_OF_BIRTH' => $request->MEMBER_DATE_OF_BIRTH, 
             'MEMBER_PHONE_NUMBER' => $request->MEMBER_PHONE_NUMBER, 
             'MEMBER_STATUS' => 'Pending', 
             'GYM_ID' => $request->GYM_ID, 
             'MEMBER_PAYMENT' => $request->MEMBER_PAYMENT, 
             'PLAN_AMOUNT' => $request->PLAN_AMOUNT,
             'PLAN_ID' => $request->PLAN_ID, 
             'PAYMENT_ID' => $id,
             'created_at' => now(), 
             'updated_at' => now()]
        );

        return redirect('/dashboard');
    }

    public function create_member(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);

        $config=['table'=>'users','length'=>10,'prefix'=>'GM-', 'field' => 'MEMBER_ID'];
        $id = IdGenerator::generate($config);
        $gym_plan = $this->getPlan($request->PLAN_ID);

        DB::table('users')->insert(
            ['MEMBER_ID' => $id, 'name' => $request->name, 'email' => $request->email, 'password' => Hash::make('password'),'created_at' => now(), 'updated_at' => now()]
        );

        $config2=['table'=>'member_details','length'=>10,'prefix'=>'PAY-', 'field' => 'PAYMENT_ID'];
        $id2 = IdGenerator::generate($config2);
        $newDateTime = Carbon::now()->addDays($gym_plan->PLAN_VALIDITY);

        

        DB::table('member_details')->insert(
            ['MEMBER_ID' =>$id, 
             'MEMBER_EXPIRY_DATE' => $newDateTime, // remove this 
             'MEMBER_ADDRESS' => $request->MEMBER_ADDRESS, 
             'MEMBER_GENDER' => $request->MEMBER_GENDER, 
             'MEMBER_DATE_OF_BIRTH' => $request->MEMBER_DATE_OF_BIRTH, 
             'MEMBER_PHONE_NUMBER' => $request->MEMBER_PHONE_NUMBER, 
             'MEMBER_STATUS' => 'Active', 
             'GYM_ID' =>$gym_plan->GYM_ID, 
             'MEMBER_PAYMENT' => 'Cash', 
             'PLAN_AMOUNT' =>$gym_plan->PLAN_AMOUNT,
             'PLAN_ID' => $request->PLAN_ID, 
             'PAYMENT_ID' => $id2,
             'created_at' => now(), 
             'updated_at' => now()]
        );



        return redirect('/staff/members');
    }

    public function activate_member(Request $request)
    {

        $affected = DB::table('member_details')
              ->where('PAYMENT_ID', $request->member_payment_id)
              ->update(['MEMBER_STATUS' => 'Active']);


        return redirect('/staff/members');
    }

    public function edit_plan(Request $request)
    {

        
        $affected = DB::table('plans')
              ->where('PLAN_ID', $request->PLAN_ID_EDIT)
              ->update([
              'PLAN_NAME' =>  $request->PLAN_NAME_EDIT, 
              'PLAN_DESCRIPTION' =>  $request->PLAN_DESCRIPTION_EDIT,
              'PLAN_VALIDITY' =>  $request->PLAN_VALIDITY_EDIT,
              'PLAN_AMOUNT' =>  $request->PLAN_AMOUNT_EDIT]);
              

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
            ->where('GYM_ID', $id)
            ->first();

        $gym_plans = DB::table('plans')
            ->where('GYM_ID', $id)
            ->where('PLAN_STATUS', 'Active')
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


}
