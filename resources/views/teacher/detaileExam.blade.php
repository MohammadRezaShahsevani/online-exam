@extends('index2')

@section('doc','details')

@section('content')

<div class="users">
  <div class="cardHeader">
      <h2>Detaile</h2>
  </div>

<table>
    <thead>
        <tr>
            <th>firstname</th>
            <th>lastname</th>
            <th>national code</th>
            <th>score</th>
            <th>option</th>
        </tr>
    </thead>
    <tbody>

        @foreach($course->student as $user)
        <tr>
            
            <td>{{$user->firstname}}</a></td>
            <td>{{$user->lastname}}</td>
            <td>{{$user->national_code}}</td>
            <td>.</td>
            <td>
            <form action="{{ route('show.answer',$user->id) }}" method="get">
            <div class="btn-div">
            <button class="btn">grade</button>
        </div>
            </form>

            </td>
        </tr>
        
        @endforeach

    </tbody>
</table>
</div>
@endsection