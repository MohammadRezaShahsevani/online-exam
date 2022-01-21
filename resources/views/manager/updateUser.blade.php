@extends('index1')

@section('doc','update')

@section('content')
<div class="users">
  <div class="cardHeader">
      <h2>{{ __('message.update_user') }}</h2>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif 
  </div>
   
    <form action="{{ route('update.user',$user->id) }}" method="post">
        @csrf
        @method('put')
        <div class="form-div">
            <label for="firstname" class="form-lable">{{ __('message.firstname') }} :</label>
            <input type="text" name="firstname" class="form-input" value="{{$user->firstname}}">
        </div>
        <div class="form-div">
            <label for="lastname" class="form-lable">{{ __('message.lastname') }} :</label>
            <input type="text" name="lastname" class="form-input" value="{{$user->lastname}}">
        </div>
        <div class="form-div">
            <label for="birth_date" class="form-lable">{{ __('message.birth_date') }} :</label>
            <input type="date" name="birth_date" class="form-input" value="{{$user->birth_date}}">
        </div>
        <div class="form-div">
            @if($user->gender=='male')
            <input type="radio" name="gender" id="male" value="male" checked>
            <label for="male">{{ __('message.male') }}</label>
            <input type="radio" name="gender" id="female" value="female">
            <label for="female">{{ __('message.female') }}</label>
            @else
            <input type="radio" name="gender" id="male" value="male">
            <label for="male">{{ __('message.male') }}</label>
            <input type="radio" name="gender" id="female" value="female" checked>
            <label for="female">{{ __('message.female') }}</label>
            @endif
        </div>
        <div class="form-div">
            <label for="national_code" class="form-lable">{{ __('message.national_code') }} :</label>
            <input type="number" name="national_code" class="form-input" value="{{$user->national_code}}">
        </div>
        <div class="form-div">
            <label for="email" class="form-lable">{{ __('message.email') }} :</label>
            <input type="email" name="email" class="form-input" value="{{$user->email}}">
        </div>
        <div class="form-div">
            @if($user->role=='teacher')
            <input type="radio" name="role" id="techer" value="teacher" checked>
            <label for="teacher">{{ __('message.teacher') }}</label>
            <input type="radio" name="role" id="student" value="student">
            <label for="student">{{ __('message.student') }}</label>
            @else
            <input type="radio" name="role" id="techer" value="teacher">
            <label for="teacher">{{ __('message.teacher') }}</label>
            <input type="radio" name="role" id="student" value="student" checked>
            <label for="student">{{ __('message.student') }}</label>
            @endif
        </div>
        <div class="btn-div">
            <button class="btn-update1">{{ __('message.Update') }}</button>
        </div>
        
    </form>
</div>

@endsection