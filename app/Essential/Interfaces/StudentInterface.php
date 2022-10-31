<?php
namespace App\Essential\Interfaces;

interface StudentInterface{

    public function read();
    public function create(array $data);
    public function edit($id);
    public function update(array $data,$id);
    public function delete($id);
    public function routin(array $data);

    public function paymentForm($id);
    public function paymentFormPost($id);
    // public function paymentPost(array $data);
    public function paymentPost($data);
}
