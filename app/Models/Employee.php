<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable=['first_name', 'last_name',
        'email', 'phone_number', 'date_of_birth', 'salary', 'is_active',];

    protected $hidden=['created_at','updated_at'];

}
