<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['starting_date', 'completion_date'];

    public function profile() {
        return $this->belongsTo('App\Models\SeekerProfile', 'seeker_profile_id');
    }
}
