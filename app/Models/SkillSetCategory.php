<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SkillSetCategory extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function skill_sets(){
        return $this->hasMany(SkillSet::class, 'skill_set_category_id');
    }
}
