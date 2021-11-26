<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeekerProfile extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(){
        $this->belongsTo('App\Models\User', 'user_id');
    }

    public function education_details(){
        $this->hasMany('App\Models\EducationDetail', 'seeker_profile_id');
    }
}
