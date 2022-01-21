@extends('index1')

@section('doc','update')

@section('content')

    <div class="users">
  <div class="cardHeader">
      <h2>Update Course</h2>
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
   
    <form action="{{ route('update.course',$course->id) }}" method="post">
        @csrf
        @method('put')
        <input hidden type="text" name="course_id">
        <div class="form-div">
            <label for="title" class="form-lable">{{ __('message.title') }} :</label>
            <input type="text" name="title" class="form-input" value="{{$course->title}}">
        </div>
        <div class="form-div">
            <label for="start" class="form-lable">{{ __('message.start') }} :</label>
            <input type="date" name="start"  class="form-input" value="{{$course->start}}">
        </div>
        <div class="form-div">
            <label for="end" class="form-lable">{{ __('message.end') }} :</label>
            <input type="date" name="end" class="form-input" value="{{$course->end}}">
        </div>
        <div class="form-div">
            <label for="" class="form-lable">{{ __('message.teacher') }} :</label>
            <select name="teacher" id="" class="form-input">
                @foreach(\App\Models\User::where('role','teacher')->get() as $teacher)
                <option value="{{ $teacher->id }}" {{in_array( $teacher->id  ,$course->teacher()->pluck('user_id')->toArray()) ? 'selected' : ''}}  >{{ $teacher->firstname ."  ". $teacher->lastname }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-div">
            <label for="" class="form-lable">{{ __('message.students') }} :</label>
            <select name="student[]" id="" class="form-input" multiple>
                @foreach(\App\Models\User::where('role','student')->get() as $student)
                <option value="{{ $student->id }}" {{in_array( $student->id  ,$course->student()->pluck('user_id')->toArray()) ? 'selected' : ''}}  >{{ $student->firstname ."  ". $student->lastname }}</option>
                @endforeach
            </select>
        </div>
        <div class="btn-div">
            <button class="btn-update1">{{ __('message.update') }}</button>
        </div>
        
    </form>


@endsection