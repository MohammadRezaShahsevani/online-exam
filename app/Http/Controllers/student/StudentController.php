<?php

namespace App\Http\Controllers\student;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Exam_Question;
use App\Models\Question;
use App\Models\Score;
use App\Models\User;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function home(){
        
        return view('student.home');
    }

    public function showCourse(){
        $ids=auth()->user()->id;
        
        $courses=User::where('id',$ids)->with('course')->first();
       
        return view('student.courses',[
            'courses'=> $courses ,
        ]);
    }

    public function exam($id){

        $exams=Course::where('id',$id)->with('exams')->first();
        
        return view('student.exam',[
            "courseId"=> $id,
            "exams"=>$exams,
        ]);

    }
    public function questions(Exam $exam){
        $questions=$exam->load('questions.opstions');
        
        $a=0;
        
        return view('student.questions',[
            "questions"=>$questions,
            "exam"=>$exam,
            "a"=>$a,
        ]);
    }

    public function answers(Exam $exam,Request $request,Answer $answer){
        
        $questions=$exam->load('questions');
    
        $a=0;
        foreach($questions->questions as $question){
            $exam_question=Exam_Question::where('exam_id',$exam->id)
            ->where('question_id',$question->pivot->question_id)->get();
            $a=$a+1;
            Answer::create([
                "answer"=>$request->answer[$a],
                "user_id"=>auth()->user()->id,
                "exam_question_id"=>$exam_question[0]->id,
            ]);
            
        }

        
        $exam->update([
            "status"=>1,
        ]);
      
        return redirect()->route('show.exam.student',$exam);
    }
}
