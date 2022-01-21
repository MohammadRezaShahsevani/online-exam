@extends('index1')

@section('doc','users')

@section('content')


<div class="users">
    <div class="cardHeader">
        <h2>Setting</h2>
    </div>
    <form action="{{ route('lang') }}" method="post">
        @csrf
        @php $locale=session()->get('locale'); @endphp
        <div class="form-div">
            <label for="" class="form-lable">{{ __('message.languege') }} :</label>
            <select name="lang" id="" class="form-input">

                <option value="en" {{ $locale=='en' ? 'selected' : '' }}>English</option>
                <option value="fa" {{ $locale=='fa' ? 'selected' : '' }}>فارسی</option>
            </select>
        </div>
        <div class="btn-div">
            <button class="btn-update1">Save</button>
        </div>
    </form>
</div>

@endsection