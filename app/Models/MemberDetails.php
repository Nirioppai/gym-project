<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemberDetails extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_expiry_date', 'member_address', 'member_gender', 'member_date_of_birth', 'member_phone_number', 'gym_id', 'member_id', 'member_payment', 'plan_id', 'health_height', 'health_weight', 'health_waist', 'health_remarks'
    ];
}
