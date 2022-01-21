<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Manager\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUser(){
        $users = User::paginate(2);

        return view('Manager.users', [
            'users' => $users
        ]);
    }
   

    public function updateStatus(Request $request,$id){
        $checkbox = '';
        if($request->status== null){
            $checkbox = '0';
        }
        else
        {
            $checkbox = '1';
        }
        User::where('id',$id)->update([
            "status"=>$checkbox,
        ]);

         return back();
    }

    public function deleteUser(User $user){
        $user->delete();
        return redirect('/admin/users');
    }

    public function showUpdate(User $user){

        return view('manager.updateUser',[
            "user"=>$user,
        ]);
    }

    public function updateUser(UserRequest $request,$id){

        User::where('id',$id)->update([
            "firstname"=>request('firstname'),
            "lastname"=>request('lastname'),
            "birth_date"=>request('birth_date'),
            "gender"=>request('gender'),
            "national_code"=>request('national_code'),
            "email"=>request('email'),
            "role"=>request('role'),
        ]);
        return redirect('/admin/users');
    }

    public function search(Request $request){

        $search=$request->search;
        $users=User::where('firstname', 'like', "%".$search."%")
        ->orWhere('lastname', 'like', "%".$search."%")
        ->orWhere('birth_date', 'like', "%".$search."%")
        ->orWhere('gender', 'like', "%".$search."%")
        ->orWhere('national_code', 'like', "%".$search."%")
        ->orWhere('email', 'like', "%".$search."%")
        ->orWhere('role', 'like', "%".$search."%")
        ->orWhere('status', 'like', "%".$search."%")
        ->orderBy('id', 'desc')
        ->get();
        
        return view('Manager.users', [
            'users' => $users
        ]);
    }
}
