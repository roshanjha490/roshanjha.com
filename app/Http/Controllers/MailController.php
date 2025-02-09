<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\ArticleCreated;
use Illuminate\Http\Request;
use App\Models\emaillist;


use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\Response;

class MailController extends Controller
{
    public function viewmail()
    {
        if (session('login_status') == 'false') {
            return view('errors.404');
        }

        return view('mail.mail_form');
    }


    public function sendEmail(Request $request)
    {

        $request->validate([
            'mail_subject' => 'required',
            'mail_desc' => 'required',
            'mail_content' => 'required',
            'mail_date' => 'required'
        ]);

        $mailData = [
            'title' => $request->mail_subject,
            'desc' => $request->mail_desc,
            'body' => $request->mail_content,
            'date' => $request->mail_date,
            'url' => 'http://roshanjha490.com'
        ];

        $allemail = Emaillist::where('status', 0)->get();

        $str = '';
        foreach ($allemail as $key => $value) {
            $email = $value['email'];

            Mail::to(array($email))->send(new ArticleCreated($mailData));

            $str .= $value['email'];
        }

        return response()->json([
            'message' => 'Email has been sent to' . $str
        ], Response::HTTP_OK);
    }
}
