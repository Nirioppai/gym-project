<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GymList extends Model
{
    use HasFactory;

        protected $fillable = [
            'gym_name', 'gym_owner', 'gym_location', 'gym_image', 'gym_details'
        ];
}
