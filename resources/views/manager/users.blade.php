@extends('index1')

@section('doc','users')

@section('content')


<div class="users">
  <div class="cardHeader">
      <h2>{{ __('message.users') }}</h2>
  </div>
  <table>
    <thead>
        <tr>
            <td>{{ __('message.id') }}</td>
            <td>{{ __('message.firstname') }}</td>
            <td>{{ __('message.lastname') }}</td>
            <td>{{ __('message.birth_date') }}</td>
            <td>{{ __('message.gender') }}</th>
            <td>{{ __('message.national_code') }}</td>
            <td>{{ __('message.email') }}</td>
            <td>{{ __('message.role') }}</td>
            <td>{{ __('message.status') }}</td>
            <td>{{ __('message.operations') }}</td>
        </tr>
    </thead>
    <tbody>

    @foreach($users as $user)
        <tr>
            
            <td>{{$user->id}}</td>
            <td>{{$user->firstname}}</a></td>
            <td>{{$user->lastname}}</td>
            <td>{{$user->birth_date}}</td>
            <td>{{$user->gender}}</td>
            <td>{{$user->national_code}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->role}}</td>
            <td>
                <form action="/admin/users/{{$user->id}}" method="post">
                @csrf
                @method('patch')   
                <button class="fs-2 bg-dark">
                    <div class="switch">
                      @if($user->status==1)
                        <input id="switch-{{$user->id}}" type="checkbox" class="switch-input" name="status" checked/>
                      @else 
                      <input id="switch-{{$user->id}}" type="checkbox" class="switch-input" name="status"/>
                      @endif
                        <label for="switch-{{$user->id}}" class="switch-label">Switch</label>
                    </div>
                </button>
                </form>
            </td>
            <td>
              
                <div>
                    <form action="{{route('delete.user',$user->id)}}" method="post">
                        @csrf
                        @method('delete')

                        <button type="submit" class="btn-delete">{{ __('message.delete') }}</button>
                    </form>
                </div>
                <div>
                    <form action="{{ route('show.update.user',$user->id)}}" method="get">
                        @csrf
                        <button type="submit" class="btn-update">{{ __('message.update') }}</button>
                    </form>
                </div>
            </td>
        </tr>
        
        @endforeach

      
    </tbody>
</table>
{{ $users->links("pagination::semantic-ui") }}
</div>

@endsection


