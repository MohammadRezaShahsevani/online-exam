<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\teacher\ExamRequest;
use App\Http\Requests\teacher\QuestionRequest;
use App\Models\Answer;
use App\Models\Course;
use App\Models\Exam;
use App\Models\Exam_Question;
use App\Models\Option;
use App\Models\Question;
use App\Models\Score;
use App\Models\User;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public function home()
    {

        return view('teacher.home');
    }

    public function showCourse()
    {
        $idt = auth()->user()->id;

        $courses = User::where('id', $idt)->with('course')->first();

        return view('teacher.courses', [
            'courses' => $courses,
        ]);
    }

    public function exam($id)
    {

        $exams = Course::where('id', $id)->with('exams')->first();

        return view('teacher.exam', [
            "courseId" => $id,
            "exams" => $exams,
        ]);
    }

    public function createExam($id)
    {

        return view('teacher.createExam', [
            "courseId" => $id,
        ]);
    }

    public function store(ExamRequest $request, $id)
    {

        $data1 = date('Y-m-d H:i:s', strtotime($request->startDate . $request->startTime));
        $data2 = date('Y-m-d H:i:s', strtotime($request->endDate . $request->endTime));
        $exam = Exam::create([

            "title" => request('title'),
            "discription" => request('discription'),
            "start_at" => $data1,
            "end_at" => $data2,
            "status" => 0,
        ]);

        $exam->courses()->attach($request->input('course'));

        return redirect()->route('show.exam', [$id]);
    }

    public function edit(Exam $exam)
    {


        $a = explode(" ", $exam->start_at);
        $b = explode(" ", $exam->end_at);
        $c = -1;
        $questions = Question::get()->all();

        //dd($questions);
        return view('teacher.updateExam', [
            "exam" => $exam,
            "a" => $a,
            "b" => $b,
            "questions" => $questions,
            "c" => $c,
        ]);
    }

    public function updateExam(ExamRequest $request, Exam $exam)
    {

        $data1 = date('Y-m-d H:i:s', strtotime($request->startDate . $request->startTime));
        $data2 = date('Y-m-d H:i:s', strtotime($request->endDate . $request->endTime));

        $exam->update([

            "title" => $request->title,
            "discription" => $request->discription,
            "start_at" => $data1,
            "end_at" => $data2,
        ]);

        return back();
    }

    public function deleteExam($id)
    {

        Exam::where('id', $id)->delete();
        return back();
    }

    public function addQuestion(Exam $exam)
    {

        $c = request('idQuestion');
        if (request("question$c") == 'on') {
            $exam->questions()->attach($c, ["score" => request("score$c")]);
        } else {
            $exam->questions()->detach($c);
        }
        return back();
    }

    public function createQuestion($exam)
    {

        return view('teacher.createQuestion', [
            "exam" => $exam,
        ]);
    }

    public function storeQuestion(QuestionRequest $request)
    {

        $question = Question::create([
            "title" => $request->title,
            "text" => $request->text,
            "type" => $request->type,
        ]);
        $question->exams()->attach($request->input('exam'), ["score" => $request->score]);
        $exam = $request->input('exam');
        $questionId = $question->id;

        if ($question->type == "test") {

            for ($i = 0; $i < count($request->textOption); $i++) {
                Option::create([
                    "text" => $request->textOption[$i],
                    "answer" => $request->answer[$i],
                    "question_id" => $questionId
                ]);
            }
        }


        return redirect()->route('edit.exam', [$exam]);
    }

    public function showBank()
    {

        $questions[] = Question::get()->all();
        return view('teacher.questionBank', [
            "questions" => $questions,
        ]);
    }

    public function detaileExam($id)
    {

        $course = Course::where('id', $id)->with('student')->first();
        // foreach($course->student as $user){
        //     $answer=Answer::where('user_id',$user->id)->where('answer',1)->get()->all();

        // }

        // foreach($answer as $aa){
        //     $exam_question=Exam_Question::where('id',$aa->exam_question_id)->first();
        // }
        return view('teacher.detaileExam', [
            'course' => $course,
        ]);
    }

    public function showAnswer(Exam $exam,User $user,)
    {
        $questions = $exam->load('questions');
        // $answer=Answer::where('user_id',$user->id)->where('exam_')
        //$answer=Exam_Question::answers()->get()->all();
        //dd($answer);
        $a = 0;
        return view('teacher.scoreQuestion', [
            "questions" => $questions,
            "user" => $user,
            "a" => $a,
        ]);
    }
}
