<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset-Password</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" >
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->


 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>
<body>
    @include('back-end.partial.notyfy')
 <div class="form-gap" style="padding-top: 70px;"></div>
<div class="container">
	<div class="row ">
		<div class="col-md-4 col-md-offset-4 ">
            <div class="panel panel-default">
              <div class="panel-body mt-5"  >
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Reset Password?</h2>
                  <p>Now, Reset reset your password from here.</p>
                  <div class="panel-body">

                    <form id="register-form" role="form"  class="form" action="{{ route('password.reset.post') }}" method="post">
                        @csrf
                      <div class="form-group">
                        <div class="form-input text-left">
                        <label for="password">New Password</label>
                        <input type="password" id="password" name="password" placeholder=" Enter your password" class="form-control @error('password') is-invalid @enderror"  >
                          @error('password') <span class="text-danger my-1 ">{{ $message }}</span> @enderror
                        </div>


                        <div class="form-input text-left">
                        <label for="password">Confirm Password</label>
                        <input type="password" id="password" name="password_confirmation" placeholder=" Enter your password" class="form-control @error('password') is-invalid @enderror"  >
                          @error('password_confirmation') <span class="text-danger ">{{ $message }}</span> @enderror
                        </div>

                      </div>
                      <input type="hidden" name="token" id="" value="{{ $token }}">
                      <input type="hidden" name="email" id="" value="{{ $email }}">

                      <div class="form-group">
                        <button type="submit" class="btn btn-lg btn-primary btn-block">Submit </button>
                      </div>


                    </form>

                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>


<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" ></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" ></script>

</body>


</html>
