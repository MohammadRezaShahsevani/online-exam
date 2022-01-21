@extends('index2')

@section('doc','bank')

@section('content')

<div class="users">
  <div class="cardHeader">
      <h2>Question Bank</h2>
  </div>

<table>
    <thead>
        <tr>
            <th>id</th>
            <th>title</th>
            <th>text</th>
            <th>type</th>
            <th>score</th>
            <th>operations</th>
        </tr>
    </thead>
    <tbody>

        @foreach($questions[0] as $question)
        <tr>
            
            <td>{{$question->id}}</td>
            <td>{{$question->title}}</td>
            <td>{{$question->text}}</td>
            <td>{{$question->type}}</td>
            <td>{{$question->score}}</td>
            <td>
                <div>
                    <form action="" method="get">
                        @csrf
                        <button type="submit" class="btn-update">Update</button>
                    </form>
                </div>
                <div>
                    <form action="" method="get">
                        @csrf
                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                </div>

            </td>
        </tr>
        
        @endforeach

    </tbody>
</table>
</div>
@endsection