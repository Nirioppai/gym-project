<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Haruncpi\LaravelIdGenerator\IdGenerator as IdGenerator;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

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
    

        if($request->MEMBER_PAYMENT =='gcash')
        {
            return view('payment-gcash', ['previous_request' => $previous_request], ['gym_plan' => $gym_plan]);
        }

        if($request->MEMBER_PAYMENT =='paymaya')
        {
            return view('payment-paymaya', ['previous_request' => $previous_request], ['gym_plan' => $gym_plan]);
        }
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
             'PLAN_ID' => $request->PLAN_ID, 
             'PAYMENT_ID' => $id,
             'created_at' => now(), 
             'updated_at' => now()]
        );

        return redirect('/dashboard');
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
