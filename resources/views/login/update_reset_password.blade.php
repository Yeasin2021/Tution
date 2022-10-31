@extends('back-end.index')
@section('content')

{{-- <center>

</center> --}}

<div class="row">
<div class="col-md-8 offset-2 pt-3">
<form action="{{ route('user.update.password') }}" method="post" >
     @csrf

    <div class="form-group">
        <label for="name">Current Password</label>
        <input type="password" name="old_password" class="form-control @error('old_password') is-invalid @enderror"  id="password"    value="">
        @error('old_password') <span class="text-danger font-italic">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="name">New Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror"  id="password" name="password_confirmation"   value="">
        @error('password') <span class="text-danger font-italic">{{ $message }}</span> @enderror
    </div>
    <div class="form-group">
        <label for="name">Confirm Password</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror"  id="password" name="password"   value="">
        @error('password') <span class="text-danger font-italic">{{ $message }}</span> @enderror
    </div>




<div class="card-footer bg-info text-right">

    <button type="submit"  class="btn btn-secondary">Change Password</button>
</div>

</form>
</div>
</div>

@endsection
