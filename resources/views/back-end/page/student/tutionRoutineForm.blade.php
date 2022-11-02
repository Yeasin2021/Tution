@extends('back-end.index')

@section('content')

<div class="container" style="margin: :auto;">
    <div class="row pt-3">

        <div class="clo-md-8">
            {{-- <form action="{{ route('routineMaker') }}" method="post">
                @csrf

                <div class="container">
                    <h2>Class Shedule</h2>
                    <table class="table table-striped text-center">
                        <thead>
                            <tr class="text-center">
                                <th>Subject</th>
                                <th>Saturday</th>
                                <th>Sunday</th>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr></tr>
                            <tr class="text-center">
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="subject[]" value="Physics" />Physics</td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Saturday" /></td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Sunday" /></td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Monday" /></td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Tuesday" /></td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Wednesday" /></td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="subject[]" value="Chamestry" />Chamestry</td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Saturday" /></td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Sunday" /></td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Monday" /></td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Tuesday" /></td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Wednesday" /></td>
                            </tr>

                            <tr class="text-center">
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="subject[]" value="Biology" />Biology</td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Saturday" /></td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Sunday" /></td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Monday" /></td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Tuesday" /></td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Wednesday" /></td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="subject[]" value="Higher Math" />Higher Math</td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Saturday" /></td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Sunday" /></td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Monday" /></td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Tuesday" /></td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Wednesday" /></td>
                            </tr>
                            <tr class="text-center">
                                <td class="text-dark" style="text-center"><input type="checkbox" id="vehicle2" name="subject[]" value="ICT" />ICT</td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Saturday" /></td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Sunday" /></td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Monday" /></td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Tuesday" /></td>
                                <td class="text-dark"><input type="checkbox" id="vehicle2" name="day[]" value="Wednesday" /></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="clo-md-8">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </form> --}}
            <form action="{{ route('routineMaker') }}" method="POST" enctype="multipart/form-data">@csrf
                @php

                    // $input = array(array());
                    // // $student_id = '';
                    // $studentData = App\Models\Student::find(4958);
                    // dd($studentData);
                @endphp
                <table class="table table-striped text-center">
                    <input type="text" name="student_id" placeholder="input Student's Id ">
                    <thead>
                        <tr class="text-center">
                            <th>Saturday</th>
                            <th>Sunday</th>
                            <th>Monday</th>
                        </tr>
                    </thead>
                    <tbody>

                        @for($i = 0; $i < 3; $i++)
                               <tr class="text-center">
                                @for($j = 0; $j < 3; $j++)
                                    <td class="text-dark"><input type="text" id="subject" name="input[][]" placeholder="Subject - {{ $i }}{{ $j }}"/></td>
                                    <td class="text-dark"><input type="text" id="subject" name="input[][]" placeholder="Subject - {{ $i }}{{ ++$j }}"/></td>
                                    <td class="text-dark"><input type="text" id="subject" name="input[][]" placeholder="Subject - {{ $i }}{{ ++$j }}"/></td>
                                    @break
                                @endfor
                               </tr>
                        @endfor
                    </tbody>
                </table>

                <div style="margin-left: 21px; margin-buttom: 10px;">
                    <button class="btn btn-primary mt-3 ml-3">Submit</button>
                </div>

                {{-- <div class="row">

                      <div class="col-6 pt-2" style="margin-left: 20px">
                        <div class="card">
                            <div class="card-body ml-2">
                              <h5 class="card-title">Add a new Student </h5>

                                <div class="form-group">
                                  <label for="formGroupExampleInput">Student's Name</label>
                                  <input type="text" class="form-control" id="formGroupExampleInput1" placeholder="Enter Student's Name" name="student_name">
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

                   </div> --}}
                  </form>
        </div>
    </div>
</div>



@endsection




