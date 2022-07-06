<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    use HasFactory;

    protected $fillable = [
        'plan_name', 'plan_description', 'plan_validity', 'plan_amount', 'plan_status', 'gym_id'
    ];
}
