@extends('index3')

@section('doc','courses')

@section('content')

<div class="users">
  <div class="cardHeader">
      <h2>Courses</h2>
  </div>

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>start</th>
            <th>end</th>
            <th>course_code</th>
            <th>operations</th>
        </tr>
    </thead>
    <tbody>

        @foreach($courses->course as $course)
        <tr>
            
            <td>{{$course->id}}</td>
            <td>{{$course->title}}</td>
            <td>{{$course->start}}</td>
            <td>{{$course->end}}</td>
            <td>{{$course->course_code}}</td>
            <td>
                <div>
                    <form action="{{ route('show.exam.student',['id'=>$course->id]) }}" method="get">
                        @csrf
                        <button type="submit" class="btn">view</button>
                    </form>
                </div>
                <div>
                   
                </div>

            </td>
        </tr>
        
        @endforeach

    </tbody>
</table>
</div>
@endsection