@extends('back-end.index')
@section('content')
<div class="container">
<form action="{{ route('student-create') }}" method="POST" enctype="multipart/form-data">@csrf
<div class="row">

      <div class="col-8 pt-2" style="margin:auto;">
        <div class="card">
            <div class="card-body ml-2">
              <h5 class="card-title">Class Shedule Maker</h5>

                <div class="form-group">
                  <label for="formGroupExampleInput">Enter Student's ID</label>
                  <input type="text" class="form-control" id="formGroupExampleInput1" placeholder="Enter Student's Id" name="student_id">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput2">Cloumn Number</label>
                  <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Class" name="cln">
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


