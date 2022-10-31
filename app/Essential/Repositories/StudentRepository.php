<?php
namespace App\Essential\Repositories;
use App\Essential\Interfaces\StudentInterface;
use App\Models\Student;
use App\Models\StudentRoutin;
use App\Models\StudentPayment;


class StudentRepository implements StudentInterface{

    public function read(){

        return Student::all();

    }

    public function create(array $data){
        return Student::create($data);
    }


    public function edit($id){
        return Student::find($id);
    }

    public function update(array $data,$id){
        $update =  Student::find($id);
        return $update->update($data);
    }

    public function delete($id){
        $delete =  Student::find($id);
        return $delete->delete();
    }

    public function routin(array $data){
        // $delete =  Student::find($id);
        return StudentRoutin::create(['routin' => json_encode($data)]);
    }



    public function paymentForm($id){
        return Student::find($id);
    }
    public function paymentFormPost($id){
        return StudentPayment::find($id);
    }


    // public function paymentPost(array $data){
    //     return StudentPayment::create($data);
    // }
    public function paymentPost($data){
        return StudentPayment::create($data);
    }





}
