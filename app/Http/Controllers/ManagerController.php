<?php

namespace App\Http\Controllers;

use App\Http\Requests\Manager\CourseRequest;
use App\Http\Requests\Manager\UserRequest;
use App\Models\Course;
use App\Models\User;
use Illuminate\Http\Request;


class ManagerController extends Controller
{
    public function index(){
       
        return view('index1');
    }

    public function settings(){
        return view('Manager.setting');
    }
    

   
    
    

    
    
}