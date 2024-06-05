<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionAnswerModel extends Model
{
    use HasFactory;
    protected $table = 'question_answer';
    protected $primariKey = 'answer_id';
    public $timestamps = false;
}
