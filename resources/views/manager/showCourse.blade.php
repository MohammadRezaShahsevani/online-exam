@extends('index1')

@section('doc','courses')

@section('content')

<div class="users">
    <div class="cardHeader">
        <h2>{{ __('message.courses') }}</h2>
        <div>
            <form action="{{ route('admin.create')}}" method="get">
                @csrf
                <button type="submit" class="btn">{{ __('message.new_course') }}</button>
            </form>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th>{{ __('message.id') }}</th>
                <th>{{ __('message.title') }}</th>
                <th>{{ __('message.start') }}</th>
                <th>{{ __('message.end') }}</th>
                <th>{{ __('message.course_code') }}</th>
                <th>{{ __('message.operations') }}</th>
            </tr>
        </thead>
        <tbody>

            @foreach($courses as $course)
            <tr>

                <td>{{$course->id}}</td>
                <td>{{$course->title}}</td>
                <td>{{$course->start}}</td>
                <td>{{$course->end}}</td>
                <td>{{$course->course_code}}</td>
                <td class="fs-4 d-flex">
                    <div>
                        <form action="{{ route('delete.course',$course->id) }}" method="post">
                            @csrf
                            @method('delete')

                            <button type="submit" class="btn-delete">{{ __('message.delete') }}</button>
                        </form>
                    </div>
                    <div>
                        <form action="{{ route('show.update',$course->id) }}" method="get">
                            @csrf
                            <button type="submit" class="btn-update">{{ __('message.update') }}</button>
                        </form>
                    </div>
                    <div>
                        <form action="{{ route('detaile.course',$course->id) }}" method="get">
                            @csrf
                            <button type="submit" class="btn">{{ __('message.view') }}</button>
                        </form>
                    </div>

                </td>
            </tr>

            @endforeach

        </tbody>
    </table>

    @endsection