<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\AuthRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    protected $gateItems = [

        ["role" => "admin", "status" => 1, "redirect_url" => '/admin'],
        ["role" => "student", "status" => 1, "redirect_url" => '/student/home'],
        ["role" => "teacher", "status" => 1, "redirect_url" => '/teacher/home'],
        ["role" => "student", "status" => 0, "redirect_url" => "/status"],
        ["role" => "teacher", "status" => 0, "redirect_url" => "/status"],
    ];

    public function showRegister()
    {
        return view("auth.register");
    }

    public function register(AuthRequest $request)
    {

        User::create([
            "firstname" => request('firstname'),
            "lastname" => request('lastname'),
            "birth_date" => request('birthdate'),
            "gender" => request('gender'),
            "national_code" => request('nationalCode'),
            "email" => request('email'),
            "password" => Hash::make(request('password')),
            "role" => request('role'),
        ]);
        return redirect("/login");
    }

    public function showlogin()
    {
        return view("auth.login");
    }

    public function login(Request $request)
    {
        $email = $request->get('email');
        $password = $request->get('password');
       
            foreach ($this->gateItems as $item) {

            if (Auth::attempt(["email" => $email, "password" => $password, "role" => $item["role"], "status" =>$item["status"]])) {
                return redirect($item["redirect_url"]);

            }

        }

                return redirect()->route('login');

    }
}
