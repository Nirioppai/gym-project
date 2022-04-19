<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plans extends Model
{
    use HasFactory;

    protected $fillable = [
        'PLAN_NAME', 'PLAN_DESCRIPTION', 'PLAN_VALIDITY', 'PLAN_AMOUNT', 'PLAN_STATUS', 'GYM_ID'
    ];
}
