<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExamUserModel extends Model
{
    use HasFactory;
    protected $table = 'exam_user';
    protected $primaryKey = 'exam_user_id';
    public $timestamps = false;
}
