<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="{{ asset('logins/style.css') }}">
  <title>Login Form Demo</title>

</head>
<body>
@include('back-end.partial.notyfy')
  <div class="login-wrapper">
    <form action="{{ route('login') }}" class="form" method="post">@csrf
      <img src="{{ asset('logins/img/avatar.png') }}" alt="">
      <h2>Login</h2>
      <div class="input-group">
        {{-- <input type="text" name="" id="loginUser" required> --}}
        <input type="email" name="email" id="email" required>
        <label for="loginUser">User Name</label>
      </div>
      <div class="input-group">
        <input type="password" name="password" id="loginPassword" required>
        <label for="loginPassword">Password</label>
      </div>
      <input type="submit" value="Login" class="submit-btn">
      {{-- <a href="#forgot-pw" class="forgot-pw">Forgot Password?</a> --}}
      <a href="{{ route('forget.password') }}" class="forgot-pw">Forgot Password?</a>
    </form>

    <div id="forgot-pw">
      <form action="{{ route('forget.password.link') }}" class="form" method="post">@csrf
        <a href="#" class="close">&times;</a>
        <h2>Reset Password</h2>

        <div class="input-group">
          <input type="email" name="email" id="email" required>
          <label for="email">Email</label>
        </div>

        {{-- <div class="input-group">
          <input type="password" name="old_password" id="old_password" required>
          <label for="password">Old Password</label>
        </div> --}}
        <div class="input-group">
            <input type="password" name="password" id="password" required>
            <label for="password">New Password</label>
          </div>
        <div class="input-group">
          <input type="password" name="password_confirmation" id="password_confirmation" required>
          <label for="password">Confirm Password</label>
        </div>

        {{-- <input type="hidden" name="token" id="" value="{{ $token }}"> --}}
        {{-- <input type="hidden" name="email" id="" value="{{ $email }}"> --}}

        <input type="submit" value="Submit" class="submit-btn">
      </form>
    </div>
  </div>
</body>

</html>
