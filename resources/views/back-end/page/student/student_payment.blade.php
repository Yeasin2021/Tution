@extends('back-end.index')
@section('content')
<div class="container">
<form action="{{ route('student-create') }}" method="POST" enctype="multipart/form-data">@csrf
<div class="row">

      <div class="col-12 pt-2" style="margin-left: 20px">
        <div class="card">
            <div class="card-body ml-2">
              <h5 class="card-title">Student Payment</h5>



              <div class="form-group">
                <label for="formGroupExampleInput" class="mt-3">Month:</label>
                <tr class="text-center">
                    <td class="m-3" style="margin: 0 0 0 17px"><input  type="checkbox"  name="month[]" value="January">January</td>
                    <td  class="m-3"><input type="checkbox"  name="month[]" value="February">February</td>
                    <td  class="m-3"><input type="checkbox"  name="month[]" value="March">March</td>
                    <td class="ml-3"><input type="checkbox"  name="month[]" value="April">April</td>
                    <td class="ml-3"><input type="checkbox"  name="month[]" value="May">May</td>
                    <td class="ml-3"><input type="checkbox"  name="month[]" value="June">June</td>
                    <td class="ml-3"><input type="checkbox"  name="month[]" value="July">July</td>
                    <td class="ml-3"><input type="checkbox"  name="month[]" value="August">August</td>
                    <td class="ml-3"><input type="checkbox"  name="month[]" value="September">September</td>
                    <td class="ml-3"><input type="checkbox"  name="month[]" value="October">October</td>
                    <td class="ml-3"><input type="checkbox"  name="month[]" value="November">November</td>
                    <td class="ml-3"><input type="checkbox"  name="month[]" value="December">December</td>
                </tr>
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


