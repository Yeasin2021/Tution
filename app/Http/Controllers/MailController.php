<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use App\Models\PhpMailHost;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class MailController extends Controller
{


    public function email() {
        return view("back-end.mail.phpMailer");
    }


     // ========== [ Compose Email ] ================
     public function composeEmail(Request $request) {
        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions
        // $sendMess = \App\Models\Subscriber::find($id);
        $Mailer = PhpMailHost::first();

        try {

            // Email server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            // $mail->Host = 'smtp.gmail.com';             //  smtp host
            $mail->Host = $Mailer->host;             //  smtp host
            $mail->SMTPAuth = true;
            // $mail->Username = 'phpdevel299@gmail.com';   //  sender username
            $mail->Username = $Mailer->user_name;   //  sender username
            // $mail->Password = 'pkhikmgwpyaymsjc';       // sender password
            $mail->Password = $Mailer->password;       // sender password
            // $mail->SMTPSecure = 'tls';                  // encryption - ssl/tls
            $mail->SMTPSecure = $Mailer->encription;                  // encryption - ssl/tls
            // $mail->Port = 587;                          // port - 587/465
            $mail->Port = $Mailer->port;                          // port - 587/465

            // $mail->setFrom('phpdevel299@gmail.com', 'PHP Developer');
            $mail->setFrom($Mailer->user_name, $Mailer->email_id_name);
            $mail->addAddress($request->emailRecipient);
            // $mail->addCC($request->emailCc);
            // $mail->addBCC($request->emailBcc);

            // $mail->addReplyTo('phpdevel299@gmail.com', 'PHP Developer');
            $mail->addReplyTo($Mailer->user_name, $Mailer->email_id_name);

            if(isset($_FILES['emailAttachments'])) {
                for ($i=0; $i < count($_FILES['emailAttachments']['tmp_name']); $i++) {
                    $mail->addAttachment($_FILES['emailAttachments']['tmp_name'][$i], $_FILES['emailAttachments']['name'][$i]);
                }
            }


            $mail->isHTML(true);                // Set email content format to HTML

            $mail->Subject = $request->emailSubject;
            $mail->Body    = $request->emailBody;

            // $mail->AltBody = plain text version of email body;

            if( !$mail->send() ) {
                //return back()->with("failed", "Email not sent.")->withErrors($mail->ErrorInfo);
                toastr()->error("Email not sent.");
                return redirect()->back()->withErrors($mail->ErrorInfo);
            }

            else {
                // return back()->with("success", "Email has been sent.");
                toastr()->success("Email has been sent.");
                return redirect()->back();
            }

        } catch (Exception $e) {
            //  return back()->with('error','Message could not be sent.');
            toastr()->error($e->errorMessage());
            return redirect()->back();
        }
    }




    // Mail data host  & view

    public function mailTemplate(){
        return view('back-end.mail.mailTemplate');
    }

    public function mailTemplatePost(Request $request){

        // $update = DB::table('php_mail_hosts')->first();
        // dd($update);

        $validator = Validator::make($request->all(), [

            'host' => 'required',
            'user_name' => 'required',
            'password' => 'required',
            'encription' => 'required',
            'port' => 'required',
            'email_id_name' => 'required',


        ]);

        if ($validator->fails()) {

           $messages = $validator->messages();

                foreach ($messages->all() as $message)
                {
                    toastr()->error ( $message);
                }

             return redirect()->back()->withInput();
       }

        $notify[]=['info','Mail data Updated !'];
        $update = PhpMailHost::first();
        // dd($update);

        $request->except('_token');
        //  dd($request->all());
        $update->update([
            'user_name'  => $request->user_name,
            'host'  => $request->host,
            'password'  => $request->password,
            'encription'  => $request->encription,
            'port'  => $request->port,
            'email_id_name'  => $request->email_id_name,
        ]);

        // dd($update);

        return redirect()->back()->withNotify($notify);


    }



}
