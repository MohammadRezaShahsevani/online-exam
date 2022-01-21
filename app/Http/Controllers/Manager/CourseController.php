<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\CourseRequest;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function showCourse(){

        $courses = Course::all();

        return view('manager.showCourse', [
            'courses' => $courses
        ]);
    }

    public function createCourse(CourseRequest $request){
        
        $data=$request->all();
        $data["course_code"] = rand(1000000000,9999999999);
        $course=Course::create($data);

        $course->teacher()->attach($request->input('teacher'),["type"=>"teacher"]);
        $course->student()->attach($request->input('student'),["type"=>"student"]);
        
       
        return redirect('/admin/courses');
    }
    
    public function deleteCourse(Course $course){

        $course->delete();
        return redirect('/admin/courses');
    }

    public function showUpdateCourse(Course $course){
        
        return view('manager.updateCourse',[
            "course"=>$course,
        ]);
    }

    public function updateCourse(Request $request ,Course $course){
        
        Course::where('id',$course)->update([
            "title"=>request('title'),
            "start"=>request('start'),
            "end"=>request('end'),
        ]);

        
        $course->teacher()->sync([$request->teacher[0]=>["type"=>"teacher"]]);
        $course->student()->syncWithoutDetaching($request->input('student'));
       
        
        return back();
    }
    
    public function detaileCourse($id){

        $course1=Course::where('id',$id)->with('teacher')->first();
        $course2=Course::where('id',$id)->with('student')->first();
       
        return view('Manager.detaileCourse', [
                'course1'=>$course1,
                'course2'=>$course2,
        ]);


    }

    public function deleteStudent($student,$course){

        $course1=Course::find($course);
        $course1->student()->detach($student);

        return back();
    
    }
}
