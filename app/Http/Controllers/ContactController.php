<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    //

    public function send_mail(Request $request){

        $this->validate($request, [

            'fname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);

        $data = array(
            'name'=>$request->fname.''.$request->lname,
            'sbj'=>$request->subject,
            'msg'=>$request->mailbody,
            'email'=>$request->email
        );

        Mail::send('mails.contact',$data, function($message) use($request) {

            $message->to($request->email)->subject
            ('Hi Saychizz Admin');
            $message->from('Admin@gmail.com','Admin');
        });

        return redirect()->back();
    }
}
