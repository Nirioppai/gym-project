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
        $staffID = auth()->guard('staff')->user()->member_id;
        $staffGym = DB::table('gym_lists')
            ->where('gym_owner', $staffID)
            ->first();

        $currentYear = now()->year;

        $january = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '1')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->sum('plan_amount');
        $february = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '2')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->sum('plan_amount');
        $march = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '3')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->sum('plan_amount');
        $april = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '4')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->sum('plan_amount');
        $may = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '5')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->sum('plan_amount');
        $june = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '6')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->sum('plan_amount');
        $july = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '7')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->sum('plan_amount');
        $august = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '8')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->sum('plan_amount');
        $september = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '9')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->sum('plan_amount');
        $october = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '10')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->sum('plan_amount');
        $november = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '11')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->sum('plan_amount');
        $december = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '12')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->sum('plan_amount');

        

        $data = array($january, $february, $march, $april, $may, $june, $july, $august, $september, $october, $november, $december);

        return $data;
    }

    
    public static function getMemberData()
    {
        $staffID = auth()->guard('staff')->user()->member_id;
        $staffGym = DB::table('gym_lists')
            ->where('gym_owner', $staffID)
            ->first();

        $currentYear = now()->year;

        $january = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '1')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->count();
        $february = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '2')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->count();
        $march = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '3')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->count();
        $april = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '4')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->count();
        $may = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '5')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->count();
        $june = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '6')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->count();
        $july = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '7')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->count();
        $august = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '8')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->count();
        $september = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '9')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->count();
        $october = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '10')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->count();
        $november = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '11')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->count();
        $december = DB::table('member_details')->whereYear('created_at', $currentYear)->whereMonth('created_at', '12')->where('gym_id', $staffGym->gym_id)->where('member_status', 'Active')->count();
        

        $data = array($january, $february, $march, $april, $may, $june, $july, $august, $september, $october, $november, $december);

        return $data;
    }

}
