<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\DB;

class Staff extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function getIncomeData()
    {
        $staffID = auth()->guard('staff')->user()->MEMBER_ID;
        $staffGym = DB::table('gym_lists')
            ->where('GYM_OWNER', $staffID)
            ->first();

        $currentYear = now()->year;

        $january = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '1')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->sum('PLAN_AMOUNT');
        $february = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '2')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->sum('PLAN_AMOUNT');
        $march = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '3')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->sum('PLAN_AMOUNT');
        $april = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '4')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->sum('PLAN_AMOUNT');
        $may = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '5')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->sum('PLAN_AMOUNT');
        $june = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '6')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->sum('PLAN_AMOUNT');
        $july = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '7')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->sum('PLAN_AMOUNT');
        $august = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '8')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->sum('PLAN_AMOUNT');
        $september = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '9')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->sum('PLAN_AMOUNT');
        $october = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '10')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->sum('PLAN_AMOUNT');
        $november = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '11')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->sum('PLAN_AMOUNT');
        $december = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '12')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->sum('PLAN_AMOUNT');

        

        $data = array($january, $february, $march, $april, $may, $june, $july, $august, $september, $october, $november, $december);

        return $data;
    }

    
    public static function getMemberData()
    {
        $staffID = auth()->guard('staff')->user()->MEMBER_ID;
        $staffGym = DB::table('gym_lists')
            ->where('GYM_OWNER', $staffID)
            ->first();

        $currentYear = now()->year;

        $january = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '1')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->count();
        $february = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '2')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->count();
        $march = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '3')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->count();
        $april = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '4')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->count();
        $may = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '5')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->count();
        $june = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '6')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->count();
        $july = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '7')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->count();
        $august = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '8')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->count();
        $september = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '9')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->count();
        $october = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '10')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->count();
        $november = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '11')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->count();
        $december = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '12')->where('GYM_ID', $staffGym->GYM_ID)->where('MEMBER_STATUS', 'Active')->count();
        

        $data = array($january, $february, $march, $april, $may, $june, $july, $august, $september, $october, $november, $december);

        return $data;
    }

}
