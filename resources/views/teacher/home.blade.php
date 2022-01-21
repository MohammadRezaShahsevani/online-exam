@extends('index2')

@section('doc','courses')

@section('content')
<div class="users">
  <div class="welcome">
      <h1>welcome {{auth()->user()->firstname}} {{auth()->user()->lastname}}</h1>
  </div>
  

       
    
</div>
  
@endsection