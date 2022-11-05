
@extends('back-end.index')
@section('content')
<div class="container">

<form action="{{ route('payment-post')}}" method="POST" enctype="multipart/form-data">@csrf
<div class="row">

      <div class="col-8 pt-2" style="margin:auto">
        <div class="card">
            <div class="card-body ml-2">
              <h5 class="card-title">Add a new Student </h5>
                <div class="form-group">
                  <label for="formGroupExampleInput">Student's Roll</label>
                  <input type="text" class="form-control" id="formGroupExampleInput1" name="roll_id" value="{{ $payment->roll_id }}" readonly="true">
                </div>
                <div class="form-group">

                  <input type="hidden" class="form-control" id="formGroupExampleInput1" name="student_id" value="{{ $payment->id }}">
                </div>
                <div class="form-group">
                  <label for="formGroupExampleInput">Student Name</label>
                  <input type="text" class="form-control" id="formGroupExampleInput1" name="student_name" value="{{ $payment->student_name }}" readonly="true">
                </div>


                <div class="form-group">
                    <label for="formGroupExampleInput" class="mt-3">Tution Fee</label>
                    <input type="text" class="form-control" id="formGroupExampleInput1"  name="tution_fee" value="{{ $payment->tution_fee }}" readonly="true">
                  </div>

                {{-- <div class="form-group">
                    <label for="formGroupExampleInput" class="mt-3">Test</label>
                    <input type="text" class="form-control" id="formGroupExampleInput1"  name="test" >
                  </div> --}}


                <div class="form-group">
                        <label for="formGroupExampleInput" class="mt-3">Month:</label>
                        <tr class="text-center">
                            <td class="ml-1"><input  type="checkbox"  name="month[]" value="January">January</td>
                            <td  class="ml-1"><input type="checkbox"  name="month[]" value="February">February</td>
                            <td  class="ml-1"><input type="checkbox"  name="month[]" value="March">March</td>
                            <td class="ml-1"><input type="checkbox"  name="month[]" value="April">April</td>
                            <td class="ml-1"><input type="checkbox"  name="month[]" value="May">May</td>
                            <td class="ml-1"><input type="checkbox"  name="month[]" value="June">June</td>
                            <td class="ml-1"><input type="checkbox"  name="month[]" value="July">July</td>
                            <td class="ml-1"><input type="checkbox"  name="month[]" value="August">August</td>
                            <td class="ml-1"><input type="checkbox"  name="month[]" value="September">September</td>
                            <td class="ml-1"><input type="checkbox"  name="month[]" value="October">October</td>
                            <td class="ml-1"><input type="checkbox"  name="month[]" value="November">November</td>
                            <td class="ml-1"><input type="checkbox"  name="month[]" value="December">December</td>
                        </tr>
                  </div>


            </div>
          </div>
      </div>



      <div class="col-4 pt-2" style="margin:auto">
        <div class="card">
            <div class="card-body ml-2">


                <div class="form-group">
                  <label for="formGroupExampleInput">Student's Image</label>
                  <img src="{{ asset($payment->image) }}" alt="Stunent_image">
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

