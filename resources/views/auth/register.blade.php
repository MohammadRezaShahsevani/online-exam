<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َregister</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/register.css') ?>">
  </head>
  <body>
  @if($errors->any())
        <div class="alert alert-dark">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form class="box" action="{{ route('register') }}" method="post">
  @csrf
  <h1>Register</h1>
  <input type="text" name="firstname" placeholder="Firstname">
  <input type="text" name="lastname" placeholder="Lastname">
  <input type="date" name="birthdate" placeholder="Birth Date">
  <input type="radio" name="gender" id="male" value="male" checked>
  <label for="male">Male</label>
  <input type="radio" name="gender" id="female" value="female">
  <label for="female">Female</label>
  <input type="number" name="nationalCode" placeholder="National Code">
  <input type="email" name="email" placeholder="Email">
  <input type="password" name="password" placeholder="Password">
  <input type="radio" name="role" id="techer" value="teacher" checked>
  <label for="teacher">teacher</label>
  <input type="radio" name="role" id="student" value="student">
  <label for="student">student</label>
  <input type="submit" name="register" value="Register">
</form>
  </body>
</html>