@extends('index2')

@section('doc','update')

@section('content')

<div class="users">
    <div class="cardHeader">
        <h2>Update Exam</h2>
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
    <form action="{{ route('update.exam',$exam->id) }}" method="post">
        @csrf
        <div class="form-div">
            <label for="title" class="form-lable">title :</label>
            <input type="text" name="title" class="form-input" value="{{$exam->title}}">
        </div>
        <div class="form-div">
            <label for="dis" class="form-lable">discription :</label>
            <textarea name="discription" id="dis" cols="30" rows="3" class="form-input">{{$exam->discription}}</textarea>
        </div>
        <div class="form-div" class="form-lable">
            <label for="start">start :</label>
            <input type="date" name="startDate" class="form-input" value="{{$a[0]}}">
        </div>
        <div class="form-div" class="form-lable">
            <label for="end">end :</label>
            <input type="date" name="endDate" class="form-input" value="{{$b[0]}}">
        </div>
        <div class="form-div" class="form-lable">
            <label for="start">start :</label>
            <input type="time" name="startTime" class="form-input" value="{{$a[1]}}">
        </div>
        <div class="form-div" class="form-lable">
            <label for="end">end :</label>
            <input type="time" name="endTime" class="form-input" value="{{$b[1]}}">
        </div>
        
        <div class="btn-div">
            <button class="btn-update1">Update</button>
        </div>

    </form>
    <form action="{{route('create.question',$exam->id) }}" method="get">
        <div class="btn-div" style="margin-top: 10px;">
            <button class="btn-update">Add New Question</button>
        </div>
    </form>
    <div class="form-div" class="form-lable">
        <table>
    <thead>
        <tr>
            <th>select</th>
            <th>title</th>
            <th>text</th>
            <th>type</th>
            <th>score</th>
        </tr>
    </thead>
    <tbody>

        @foreach($questions as $question)
        <tr>
            <form action="{{ route('add.question',$exam->id) }}" method="post">
            @csrf    
            <td>
                    <button style="background: white;">
                        <input style="margin: 2.5px 10.5px 2.5px 2.5px;" type="checkbox" name="question{{$question->id}}" {{in_array( $question->id  ,$exam->questions()->pluck('question_id')->toArray()) ? 'checked' : ''}}>
                        <input type="hidden" name="idQuestion" value="{{$question->id}}">
                    </button>
                 
            </td>
            <td>{{$question->title}}</td>
            <td>{{$question->text}}</td>
            <td>{{$question->type}}</td>
            <td>
                <input type="text" name="score{{$question->id}}" step="0.01" class='form-inputjs2'>
            </td>
        </tr>
        </form>
        @endforeach

    </tbody>
</table>
    
        </div>

    @endsection