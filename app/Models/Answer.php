<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $table = "answers";
    protected $fillable = ['answer','user_id','exam_question_id'];

    public function exam_question(){

        return $this->belongsTo( Exam_Question::class ,'exam_question_id' );
    }
}
