@extends('back-end.index')
@section('title')
 Mail Host Page
@endsection
@section('content')
<div class="container">
    <div class="row">
        <form action="{{ route('mail-host-post') }}" method="post" class="px-4 py-3">
            @csrf
           <div class="form-group">
             <label for="exampleInputEmail1">User Name</label>
             <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="user_name">
             <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
           </div>
           <div class="form-group">
             <label for="exampleInputPassword1">Password</label>
             <input type="password" class="form-control" id="exampleInputPassword1" name="password">
           </div>
           <div class="form-group">
             <label for="exampleInputHost">Host</label>
             <input type="text" class="form-control" id="exampleInputHost" name="host">
           </div>
           <div class="form-group">
             <label for="exampleInputEncription">Encription</label>
             <input type="text" class="form-control" id="exampleInputEncription" name="encription">
           </div>
           <div class="form-group">
             <label for="exampleInputPort">Port</label>
             <input type="text" class="form-control" id="exampleInputPort" name="port">
           </div>
           <div class="form-group">
             <label for="exampleInputEmailName">Email Profile Name</label>
             <input type="text" class="form-control" id="exampleInputEmailName" name="email_id_name">
           </div>
           {{-- <div class="form-group form-check">
             <input type="checkbox" class="form-check-input" id="exampleCheck1">
             <label class="form-check-label" for="exampleCheck1">Check me out</label>
           </div> --}}
           <button type="submit" class="btn btn-primary mt-3">Submit</button>
         </form>
    </div>
</div>


@endsection
