@extends('index2')

@section('doc','create')

@section('content')

<div class="users">
  <div class="cardHeader">
      <h2>Create Exam</h2>
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
    <form action="{{ route('store.exam',$courseId) }}" method="post">
        @csrf
        <div class="form-div">
            <label for="title" class="form-lable">title :</label>
            <input type="text" name="title" class="form-input">
        </div>
        <div class="form-div">
            <label for="dis" class="form-lable">discription :</label>
            <textarea name="discription" id="dis" cols="30" rows="3" class="form-input"></textarea>
        </div>
        <div class="form-div">
            <label for="start" class="form-lable">start :</label>
            <input type="date" name="startDate"  class="form-input">
        </div>
        <div class="form-div">
            <label for="end" class="form-lable">end :</label>
            <input type="date" name="endDate" class="form-input">
        </div>
        <div class="form-div">
            <label for="start" class="form-lable">start :</label>
            <input type="time" name="startTime"  class="form-input">
        </div>
        <div class="form-div">
            <label for="end" class="form-lable">end :</label>
            <input type="time" name="endTime" class="form-input">
        </div>
        <input type="hidden" name="course" value="{{$courseId}}">
       
        <div class="btn-div">
            <button class="btn-update1">Create</button>
        </div>
        
    </form>


@endsection