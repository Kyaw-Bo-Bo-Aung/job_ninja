<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExperienceDetail extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $dates = ['start_date', 'end_date'];

    public function profile() {
        return $this->belongsTo('App\Models\SeekerProfile', 'seeker_profile_id');
    }
}
