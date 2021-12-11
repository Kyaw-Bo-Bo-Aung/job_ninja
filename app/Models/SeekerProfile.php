<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeekerProfile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }

    public function education_details(){
        return $this->hasMany('App\Models\EducationDetail', 'seeker_profile_id');
    }

    public function experience_details(){
        return $this->hasMany( ExperienceDetail::class, 'seeker_profile_id');
    }
}
