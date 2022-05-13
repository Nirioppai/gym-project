<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'MEMBER_EXPIRY_DATE', 'MEMBER_ADDRESS', 'MEMBER_GENDER', 'MEMBER_DATE_OF_BIRTH', 'MEMBER_PHONE_NUMBER', 'GYM_ID', 'MEMBER_ID', 'MEMBER_PAYMENT', 'PLAN_ID', 'HEALTH_HEIGHT', 'HEALTH_WEIGHT', 'HEALTH_WAIST', 'HEALTH_REMARKS'
    ];
}
