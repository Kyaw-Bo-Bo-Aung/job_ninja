<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeekerSkillSet extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function skill_sets(){
        return $this->belongsTo(SkillSet::class, 'skill_set_id');
    }

}
