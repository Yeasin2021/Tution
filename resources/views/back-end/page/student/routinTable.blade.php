@extends('back-end.index')

@section('content')

<div class="container" style="margin: :auto;">
    <div class="row pt-3">
        {{--
        <div class="col-sm-8">
            <table id="example" class="table table-striped" style="width: 100%; margin: auto;">
                <thead>
                    <tr>
                        <th class="text-center text-dark">Subject</th>
                        <th class="text-center text-dark">Saturday</th>
                        <th class="text-center text-dark">Sunday</th>
                        <th class="text-center text-dark">Monday</th>
                        <th class="text-center text-dark">Tuesday</th>
                        <th class="text-center text-dark">Wednesday</th>
                    </tr>
                </thead>
                @php $cars = array ( array("Physics","","","","",""), array("Chamistry","","","","",""), array("Biology","","","","",""), array("Ict","","","","",""), array("Higher Math","","","","",""), ); @endphp
                <tbody>
                    @foreach ($cars as $key=>$value)
                    <tr class="text-center text-dark">
                        @for($day=0; $day<=5; $day++)

                        <td class="text-dark"><input type="checkbox" id="vehicle2" name="days[]" />{{ $cars[$key][$day] }}</td>

                        @endfor
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        --}}
        <div class="clo-md-8">
            <form action="{{ route('shedule-maker-form-post') }}" method="post">
                @csrf

                <div class="container">
                    <h2>Class Shedule</h2>
                    <table class="table table-striped">
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
            </form>
        </div>
    </div>
</div>



@endsection


