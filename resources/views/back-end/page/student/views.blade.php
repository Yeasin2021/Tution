@extends('back-end.index')
@push('style')
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css">
@endpush
@section('content')

<div class="container">
    <div class="row pt-3">
      <div class="col-sm">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center text-dark">Id</th>
                    <th class="text-center text-dark">Name</th>
                    <th class="text-center text-dark">Class</th>
                    <th class="text-center text-dark">Group</th>
                    <th class="text-center text-dark">Tution Fee</th>
                    <th class="text-center text-dark">Tution Day</th>
                    <th class="text-center text-dark">Admission Date</th>
                    <th class="text-center text-dark">Image</th>
                    <th class="text-center text-dark">Message</th>
                    {{-- <th class="text-center text-dark">Routine</th> --}}
                    <th class="text-center text-dark">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $key=>$student)
                    <tr class="text-center text-dark">
                        <td class="text-dark"><a href="{{ route('payment-form',$student->id) }}">{{ $student->student_id }}</a></td>
                        <td class="text-dark"><a href="{{ route('routineView',$student->student_id) }}">{{ $student->student_name }}</a></td>
                        <td class="text-dark">{{ $student->student_class }}</td>
                        <td class="text-dark">{{ $student->group }}</td>
                        <td class="text-dark">{{ $student->tution_fee }}</td>
                        <td class="text-dark">{{ $student->tution_day }}</td>
                        <td class="text-dark">{{ $student->created_at }}</td>
                        <td height="100px" width="100px"><img src="{{ $student->image }}"></td>
                        <td><button class="btn btn-primary">Message</button></td>
                        {{-- <td><a href="{{ route('routineView',$student->id) }}">View</a></td> --}}
                        <td>
                            <a href="{{ route('student-edit',$student->id )}}"><i class="fa fa-edit fa-2x"></i></a>
                            <a href="{{ route('student-delete',$student->id )}}"><i class="fa fa-trash fa-2x text-danger"></i></a>
                        </td>
                    </tr>
                @endforeach

            </tbody>
            <tfoot>
                <tr>
                    <th class="text-center">Id</th>
                    <th class="text-center">Name</th>
                    <th class="text-center">Class</th>
                    <th class="text-center">Group</th>
                    <?php $sum = \App\Models\Student::sum('tution_fee');?>
                    <th class="text-center">Tution Fee {{ $sum }} </th>
                    <th class="text-center">Tution Day</th>
                    <th class="text-center">Admission Date</th>
                    <th class="text-center">Image</th>
                    <th class="text-center">Message</th>
                    <th class="text-center">Action</th>
                </tr>
            </tfoot>
        </table>
      </div>
    </div>
  </div>


@endsection

@push('js')



<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script>
    $(document).ready(function () {
    $('#example').DataTable();
});
</script>

@endpush
