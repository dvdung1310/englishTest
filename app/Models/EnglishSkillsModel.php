<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EnglishSkillsModel extends Model
{
    use HasFactory;
    protected $table = 'english_skills';
    protected $primaryKey = 'skills_id';
    public $timestamps = false;

}
