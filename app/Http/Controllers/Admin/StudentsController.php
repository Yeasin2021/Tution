<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Essential\Interfaces\StudentInterface;
use Illuminate\Support\Facades\Validator;
use App\Models\StudentRoutin;
use Exception;
use File;
use Illuminate\Support\Facades\Storage;

class StudentsController extends Controller
{

    public $student;

    public function __construct(StudentInterface $student){
        $this->student  =  $student;
    }


    public function studentForm(){
        return view('back-end.page.student.create');
    }


    public function studentShow(){
        $students = $this->student->read();
        return view('back-end.page.student.views',compact('students', $students));
    }




    public function saveStudent(Request $request)
    {
            // $collection = $request->except(['images']);
            $validator = Validator::make($request->all(), [
                'student_name' => 'required',
                'student_class' => 'required',
                'institute' => 'required',
                'tution_fee' => 'required',
                'phone' => 'required|regex:/(01)[0-9]{9}$/|unique:students',
                'image' => 'required',
                'group' => 'required',
                'gender' => 'required',
                'tution_day' => 'required',
            ]);

            if ($validator->fails()) {

                $messages = $validator->messages();

                     foreach ($messages->all() as $message)
                     {
                         toastr()->error ( $message, 'Error');
                     }

                  return redirect()->back()->withInput();
            }


            try{

                $collection = $request->all();
                if($request->hasFile('image')){
                    $file= $request->file('image');
                    $tempFilePath = "image/students/";
                    $hardPath = $tempFilePath.'students_'.$request->student_name.'_'.rand(0,999999).'-g.jpg';
                    $move = $file->move($tempFilePath,$hardPath);
                    // $move = $file->move(public_path($tempFilePath), $hardPath);
                    $collection['image'] = $hardPath;

                    // $file= $request->file('image');
                    // $filename= date('YmdHi').$file->getClientOriginalName();
                    // $file->move(public_path('image/students/'), $filename);
                    // $collection['image']= $filename;

               }



                $this->student->create($collection);
                toastr()->success("Successfully Work done ");
                return redirect()->route('student-form');

        }
        catch(Exception $error){
                toastr()->error($error->getMessage());
                return redirect()->route('student-form');
        }


    }





    public function studentEdit($id){
        $edit = $this->student->edit($id);
        return view("back-end.page.student.edit",compact('edit',$edit));
    }



    public function studentUpdate(Request $request,$id)
    {
            // $collection = $request->except(['images']);
            $validator = Validator::make($request->all(), [
                'student_name' => 'required',
                'student_class' => 'required',
                'institute' => 'required',
                'tution_fee' => 'required',
                'phone' => 'required|regex:/(01)[0-9]{9}$/',
                // 'image' => 'required',
                'group' => 'required',
                'gender' => 'required',
                'tution_day' => 'required',
            ]);

            if ($validator->fails()) {

                $messages = $validator->messages();

                     foreach ($messages->all() as $message)
                     {
                         toastr()->error ( $message, 'Error');
                     }

                  return redirect()->back()->withInput();
            }


            try{
                // image unlink from folder
                $editImage = $this->student->edit($id);
                $oldImage = $editImage->image;
                if($request->hasFile('image')){
                    if(File::exists($oldImage)){
                        File::delete( $oldImage);
                    }
                    //End image unlink from folder

                    $collection = $request->all();
                    $file= $request->file('image');
                    $tempFilePath = "image/students/";
                    $hardPath = $tempFilePath.'students_'.$request->student_name.'_'.rand(0,999999).'-g.jpg';

                    $move = $file->move($tempFilePath,$hardPath);
                    $collection['image'] = $hardPath;

               }



                $this->student->update($collection, $id);
                toastr()->success("Successfully Updated done ");
                return redirect()->route('student-datatable');

        }
        catch(Exception $error){
                toastr()->error($error->getMessage());
                return redirect()->route('student-edit');
        }


    }



    public function studentDelete($id)
    {

            // image unlink from folder
            $deleteImage = $this->student->edit($id);
                $removeImage = $deleteImage->image;

                    if(File::exists($removeImage)){
                        File::delete( $removeImage);
                    }
            // image unlink end

            // database field deleted
            $this->student->delete($id);
            return redirect()->route('student-datatable');

   }


   public function classRoutinMakerForm(Request $request){
    $sutdent_id = $request->student_id;
    $cloumn = $request->cln;
    return view("back-end.page.student.sheduleMaker",['sutdent_id','cloumn' => $sutdent_id, $cloumn]);
   }


   public function routin(Request $request){

        // $collection = $request->all();
        $collection1 = $request->subject;
        $collection2 = $request->day;
        dd(json_encode( $request->day));

        // $this->student->routin(json_encode($request->subject));
        $this->student->routin($collection);

        // StudentRoutin::create([
        //     'routin' => json_encode($request->subject),
        // ]);
        return redirect()->route('dash-board');
   }



//    from data store into a json file


   public function jsonForm(){

    return view('json.json-form');

   }

   public function storeJsonData(Request $request){

    $collection = $request->only('firstname', 'lastname', 'country','subject');
    $data = array($collection);
    // dd($data);

    if(filesize("store.json") == 0){
        $first_record = array($data);
        $data_to_save = $first_record;
     }else{
        $old_records = json_decode(file_get_contents("store.json"));
        array_push($old_records, $data);
        $data_to_save = $old_records;
     }

     $encoded_data = json_encode($data_to_save, JSON_PRETTY_PRINT);

     if(!file_put_contents("store.json", $encoded_data, LOCK_EX)){
        // $error = "Error storing message, please try again";
        toastr()->error("Error storing message, please try again");
        return redirect()->back();
     }else{
        // $success =  "Message is stored successfully";
        toastr()->success("Message is stored successfully");
        return redirect()->back();
     }
   }

// /  End  from data store into a json file



public function studentPaymentForm($id){

    $payment = $this->student->paymentForm($id);
    $paymentPost = $this->student->paymentFormPost($id);

    return view('back-end.page.student.payment',compact('payment','paymentPost',$payment,$paymentPost));
}

public function studentPaymentPost(Request $request){

    $id = '';
    // $collection = $request->only('student_id','student_name','tution_fee','month');
    $collection = $request->except(['_token']);
    $month = json_encode($request->month);

    // dd($month);
    // return (json_encode($collection));
    // $this->student->paymentPost($month);
    // $this->student->paymentPost($month);

    // $id = \App\Models\StudentPayment::find($id);
    // $data[] = $id->month;
    // $input = $request->test;
    // array_push($data,$input);
    // dd($data);

    // dd($id->month);
    // $update->update([

    //     'student_id' => $request->student_id,
    //     'student_name' => $request->student_name,
    //     'tution_fee' => $request->tution_fee,
    //     'month' => $month,

    // ]);
    // $paymentPost = $this->student->paymentFormPost($id);
    // if($paymentPost->id != NULL){
    //     $id->update([
    //         'student_id' => $request->student_id,
    //         'roll_id' => $request->roll_id,
    //         'student_name' => $request->student_name,
    //         'tution_fee' => $request->tution_fee,
    //         'month' => $month,
    //     ]);
    // }
    // else{
    //     \App\Models\StudentPayment::create([

    //         'roll_id' => $request->roll_id,
    //         'student_id' => $request->student_id,
    //         'student_name' => $request->student_name,
    //         'tution_fee' => $request->tution_fee,
    //         'month' => $month,

    //     ]);
    // }

    \App\Models\StudentPayment::create([

        'student_id' => $request->student_id,
        'roll_id' => $request->roll_id,
        'student_name' => $request->student_name,
        'tution_fee' => $request->tution_fee,
        'month' => $month,

    ]);



    // dd(json_encode($collection));
    toastr()->success("Student Payment Successfully");
    return redirect()->back();
}



}
