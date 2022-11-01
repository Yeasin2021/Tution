
@extends('back-end.index')

@section('content')
<style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>

@php

    $routine = array(
        array('PHYSICS','ICT','BIOLOGY'),
        array('HIGHER MATH','CHAMESTRY','ICT'),
        array('HIGHER MATH','CHAMESTRY','PHYSICS')
    );

    $row    = count($routine);
    $column  = count($routine[0]);

@endphp
<div class="container" style="margin: :auto;">
    <div class="row pt-3">

        <div class="clo-md-8">
            <table>
                <tr style="text-align: center">
                  <th style="text-align: center">Sunday</th>
                  <th style="text-align: center">Tuesday</th>
                  <th style="text-align: center">Thursday</th>
                </tr>
                @for($i = 0; $i<$row; $i++)
                    @for($j = 0; $j<$column; $j++)
                        <tr>
                            <th style="text-align: center">{{ $routine[$i][$j] }}</th>
                            <th style="text-align: center">{{ $routine[$i][++$j] }}</th>
                            <th style="text-align: center">{{ $routine[$i][++$j] }}</th>
                        </tr>
                    @endfor
                @endfor
              </table>
        </div>
    </div>
</div>



@endsection













