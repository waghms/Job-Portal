<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'firstname',
        'middlename',
        'lastname',
        'dob',
        'email',
        'gender',
        'address',
        'country',
        'state',
        'district',
        'pincode',
        'contact_no',
        'pancard_no',
        'ssc_highschool_name',
        'ssc_percentage',
        'ssc_passout_year',
        'hsc_college_name',
        'hsc_percentage',
        'hsc_passout_year',
        'graduation_college_name',
        'graduation_percentage',
        'graduation_passout_year',
        'skills',
        'company_name',
        'work_experience',
        'location',
        'postname',
        'profilephoto',
    ];
}
