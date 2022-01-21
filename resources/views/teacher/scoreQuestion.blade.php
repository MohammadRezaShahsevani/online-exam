@extends('index3')

@section('doc','courses')

@section('content')

<div class="users">
    <div class="cardHeader">
        <h2>Scores</h2>
        <p id="timer"> </p>
    </div>
    
    <form action="{{ route('show.answer',$user->id) }}" method="post">
    @csrf
    
        @foreach($questions->questions as $question)
        @if($question->type !== "test")
        <div style="margin-top: 20px;">
            <h3>{{$a=$a+1}}. {{$question->text}}</h3>
        </div>

        <div class="form-div">
            <textarea name="answer[{{$a}}]" id="option" rows="5" class="form-input"></textarea>
        </div>
        @endif
        @endforeach
    
        <div class="btn-div">
            <button class="btn-update1">calculation</button>
        </div>
    </form>
</div>
@endsection