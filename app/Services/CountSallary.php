<?php
namespace App\Services;
use App\Models\Student;


class CountSallary{

    public function studentSallary(){
        // echo "Hello I am Working Bro !!!";
        $sallry = Student::all();
        // dd($sallry->sum('tution_fee'));
        return $sallry->sum('tution_fee');
    }


}


?>
