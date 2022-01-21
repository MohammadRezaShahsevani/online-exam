@extends('index3')

@section('doc','courses')

@section('content')

<div class="users">
  <div class="cardHeader">
      <h2>Exams</h2>
  </div>
<table>
    <thead>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>description</th>
            <th>start</th>
            <th>end</th>
            <th>operations</th>
        </tr>
    </thead>
    <tbody>

        @foreach($exams->exams as $exam)
        <tr>
            
            <td>{{$exam->id}}</td>
            <td>{{$exam->title}}</td>
            <td>{{$exam->discription}}</td>
            <td>{{$exam->start_at}}</td>
            <td>{{$exam->end_at}}</td>
            <td>
                @if(($exam->status==0) && (($exam->start_at <= now()) && ($exam->end_at >= now())))
                <div>
                    <form action="{{ route('question.student', $exam->id) }}" method="get">
                        @csrf
                        <button type="submit" class="btn">Start</button>
                    </form>
                </div>
                @else
                <div>
                <p>Illegal</p> 
                </div>
                @endif
            </td>
        </tr>
        
        @endforeach

    </tbody>
</table>
</div>
@endsection