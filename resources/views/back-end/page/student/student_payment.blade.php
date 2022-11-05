@extends('back-end.index')
@section('content')
<div class="container">
<form action="{{ route('student-create') }}" method="POST" enctype="multipart/form-data">@csrf
<div class="row">

      <div class="col-6 pt-2" style="margin-left: 20px">
        <div class="card">
            <div class="card-body ml-2">
              <h5 class="card-title">Add a new Student </h5>

                <div class="form-group">
                  <label for="formGroupExampleInput">Student's Name</label>
                  <input type="text" class="form-control" id="formGroupExampleInput1" placeholder="Enter Student's Name" name="student_name">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Student's Class</label>
                  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Class" name="student_class">
                </div>






            </div>
          </div>
      </div>
      <div class="col-lg-4 pt-2">
        <div class="card">
            <div class="card-body">

                <div class="form-group">
                    <label for="formGroupExampleInput2">Student Email</label>
                    <input type="email" class="form-control" id="formGroupExampleInput5" placeholder="Email" name="email">
                  </div>


            </div>
        </div>

    </div>

    <div style="margin-left: 21px; margin-buttom: 10px;">
        <button class="btn btn-primary mt-3 ml-3">Submit</button>
    </div>

   </div>
  </form>
  </div>

@endsection


