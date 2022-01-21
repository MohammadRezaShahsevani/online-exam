@extends('index1')

@section('doc','create')

@section('content')

<div class="users">
  <div class="cardHeader">
      <h2>{{ __('message.create_course') }}</h2>
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
    <form action="{{ route('createCourse') }}" method="post">
        @csrf
        <div class="form-div">
            <label for="title" class="form-lable">{{ __('message.title') }} :</label>
            <input type="text" name="title" class="form-input">
        </div>
        <div class="form-div">
            <label for="start" class="form-lable">{{ __('message.start') }} :</label>
            <input type="date" name="start"  class="form-input">
        </div>
        <div class="form-div">
            <label for="end" class="form-lable">{{ __('message.end') }} :</label>
            <input type="date" name="end" class="form-input">
        </div>
        <div class="form-div">
            <label for="" class="form-lable">{{ __('message.teacher') }} :</label>
            <select name="teacher" id="" class="form-input">
                @foreach(\App\Models\User::where('role','teacher')->get() as $teacher)
                <option value="{{ $teacher->id }}">{{ $teacher->firstname ." ". $teacher->lastname }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-div">
            <label for="" class="form-lable">{{ __('message.students') }} :</label>
            <select name="student[]" id="" class="form-input" multiple>
                @foreach(\App\Models\User::where('role','student')->get() as $student)
                <option value="{{ $student->id }}">{{ $student->firstname ." ". $student->lastname }}</option>
                @endforeach
            </select>
        </div>
        <div class="btn-div">
            <button class="btn-update1">{{ __('message.create') }}</button>
        </div>
        
    </form>
</div>

@endsection