<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gyms = DB::table('gym_lists')->take(5)->get();

        $active_member_plans = DB::table('view_plan_list')
        ->where('member_id', Auth::user()->member_id)
        ->where('member_status', 'Active')
        ->get();

        $other_plans = DB::table('view_plan_list')
        ->where('member_id', Auth::user()->member_id)
        ->whereNot(function ($query) {
            $query->where('member_status', 'Active');
        })
        ->get();
    

        return view('dashboard')
            ->with('gyms',  $gyms)
            ->with('active_member_plans', $active_member_plans)
            ->with('other_plans', $other_plans);
    }

    public function password_change_ui()
    {
        return view ('change_password');
    }

    public function password_change(Request $request)
    {


        $request->validate([
            'old_password' => ['required', 'string', ],
            'new_password' => ['required','min:8', 'string', 'confirmed'],
        ]);

      if(!Hash::check($request->old_password, Auth::user()->password))
      {
          return back()->with("error", "Current Password is incorrect.");
      }

        

        User::whereId(Auth::user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        return back()->with("success", "Password updated successfully.");
        
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
        //
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

    public function logOut(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function display_terms()
    {
        return view('auth.terms');
    }

    public function delete_member($member_id)
    {
        $member_to_delete = DB::table('member_details')->where('member_id', $member_id)->delete();
        // $user_to_delete = DB::table('users')->where('member_id', $member_id)->delete();

        return redirect('/staff/members');
    }
}
