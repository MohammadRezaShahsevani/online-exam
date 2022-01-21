<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>َlogin</title>
    <link rel="stylesheet" type="text/css" href="<?php echo asset('css/login.css') ?>">
  </head>
  <body>

<form class="box" action="{{ route('login') }}" method="post">
  @csrf
  <h1>Login</h1>
  <input type="email" name="email" placeholder="Email">
  <input type="password" name="password" placeholder="Password">
  <input type="submit"  value="Login">
<a href="/register">Register</a>
</form>


  </body>
</html>