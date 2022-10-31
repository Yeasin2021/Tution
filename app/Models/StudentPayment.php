<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentPayment extends Model
{
    use HasFactory;
    // protected $table = "student_payments";
    protected $guarded = [];
    // protected $fillable = ['student_name','student_id','tution_fee','month'];
}
