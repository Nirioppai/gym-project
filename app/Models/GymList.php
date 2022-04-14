<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymList extends Model
{
    use HasFactory;

        protected $fillable = [
            'GYM_NAME', 'GYM_OWNER', 'GYM_LOCATION', 'GYM_IMAGE', 'GYM_DETAILS'
        ];
}
