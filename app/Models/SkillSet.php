<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillSet extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function seeker_skill_sets(){
        return $this->hasMany(SeekerSkillSet::class);
    }
}
