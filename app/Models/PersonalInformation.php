<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalInformation extends Model
{
    protected $table = 'personal_information';
    
    protected $fillable = [
        'full_name',
        'email',
        'phone',
        'address',
        'professional_objective',
        'photo',
    ];
}