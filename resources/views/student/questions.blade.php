@extends('index3')

@section('doc','courses')

@section('content')

<div class="users">
    <div class="cardHeader">
        <h2>Exams</h2>
        <p id="timer"> </p>
    </div>
    
    <form action="{{ route('answer.student',$exam) }}" method="post">
    @csrf
    
        @foreach($questions->questions as $question)
        <div style="margin-top: 20px;">
            <h3>{{$a=$a+1}}. {{$question->text}}</h3>
        </div>
        @if($question->type == "test")
        @foreach($question->opstions as $option)
        
        <div class="form-div">
            <input type="radio" name="answer[{{$a}}]" id="option" value="{{$option->answer}}">
            <label for="option">{{$option->text}}</label>
        </div>
        @endforeach
        @else
        <div class="form-div">
            <textarea name="answer[{{$a}}]" id="option" rows="5" class="form-input"></textarea>
        </div>
        @endif
        @endforeach
        <div class="btn-div">
            <button class="btn-update1">Finish Exam</button>
        </div>
    </form>
</div>
<script>
    window.onload = function() {
        var minute = 30;
        var sec = 59;
        setInterval(function() {
            document.getElementById("timer").innerHTML = minute + " : " + sec;
            sec--;
            if (minute == 0 && sec == 0) {

                window.location = '';
            }
            if (sec == 00) {
                minute--;
                sec = 60;

            }
        }, 1000);
    }
    
</script>
@endsection