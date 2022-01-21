@extends('index2')

@section('doc','courses')

@section('content')

<div class="users">
  <div class="cardHeader">
      <h2>Exams</h2>
      <div>
            <form action="{{ route('create.exam',$courseId) }}" method="get">
            @csrf
                <button type="submit" class="btn">New Exam</button>
            </form>
        </div>
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
                <div>
                    <form action="{{ route('delete.exam',$exam->id) }}" method="post">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn-delete">Delete</button>
                    </form>
                </div>
                <div>
                    <form action="{{ route('edit.exam',$exam->id) }}" method="get">
                        @csrf
                        <button type="submit" class="btn-update">Update</button>
                    </form>
                </div>
                <div>
                    <form action="{{ route('detaile.Exam',$courseId) }}" method="get">
                        @csrf
                        <button type="submit" class="btn">view</button>
                    </form>
                </div>

            </td>
        </tr>
        
        @endforeach

    </tbody>
</table>
</div>
@endsection