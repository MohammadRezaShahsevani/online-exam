@extends('index1')

@section('doc','details')

@section('content')

<div class="users">
  <div class="cardHeader">
      <h2>{{ __('message.detaile') }}</h2>
  </div>

<table>
    <thead>
        <tr>
            <th>{{ __('message.id') }}</th>
            <th>{{ __('message.firstname') }}</th>
            <th>{{ __('message.lastname') }}</th>
            <th>{{ __('message.birth_date') }}</th>
            <th>{{ __('message.gender') }}</th>
            <th>{{ __('message.national_code') }}</th>
            <th>{{ __('message.email') }}</th>
            <th>{{ __('message.role') }}</th>
        </tr>
    </thead>
    <tbody>
       @foreach($course1->teacher as $course)
        <tr>
            <td>{{$course->id}}</td>
            <td>{{$course->firstname}}</a></td>
            <td>{{$course->lastname}}</td>
            <td>{{$course->birth_date}}</td>
            <td>{{$course->gender}}</td>
            <td>{{$course->national_code}}</td>
            <td>{{$course->email}}</td>
            <td>{{$course->role}}</td>
        </tr>
      @endforeach
    </tbody>
</table>

<table>
    <thead>
        <tr>
            <th>{{ __('message.id') }}</th>
            <th>{{ __('message.firstname') }}</th>
            <th>{{ __('message.lastname') }}</th>
            <th>{{ __('message.birth_date') }}</th>
            <th>{{ __('message.gender') }}</th>
            <th>{{ __('message.national_code') }}</th>
            <th>{{ __('message.email') }}</th>
            <th>{{ __('message.role') }}</th>
            <th>{{ __('message.delete') }}</th>
        </tr>
    </thead>
    <tbody>

        @foreach($course2->student as $user)
        <tr>
            
            <td>{{$user->id}}</td>
            <td>{{$user->firstname}}</a></td>
            <td>{{$user->lastname}}</td>
            <td>{{$user->birth_date}}</td>
            <td>{{$user->gender}}</td>
            <td>{{$user->national_code}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role}}</td>
            <td class="fs-3 d-flex">
                <div>
                    <form action="/admin/course/delete/student/{{$user->id}}/{{$course2->id}}" method="post">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn-delete">{{ __('message.delete') }}</button>
                    </form>
                </div>
            </td>
        </tr>
        
        @endforeach

    </tbody>
</table>
</div>
@endsection

