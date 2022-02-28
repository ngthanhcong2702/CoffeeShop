<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserController extends Controller
{

    public function index() {
        return view('content.contact'); 
    }

    public function sendMail(Request $request) {
        function reply($request) {
            $to_email_address = $request->mail;
            $subject = 'Café House Phản hồi về: ' . $request->subject;
            $message = 'Chào ' . $request->name . ', Chúng tôi đã nhận được phản hồi của bạn về Cafe House với tiêu đề <' . $request->subject . '>. Chúng tôi rất cảm ơn về góp ý của bạn cho vấn đề trên. Hiện bộ phận chăm sóc khách hàng đã tiếp nhận và sẽ phản hồi bạn trong thời gian sớm nhất nhé ';
            $headers = 'from: noreply@gmail.com';
            mail($to_email_address, $subject, $message,$headers);
        }
        reply($request);
        return redirect ('/contact');
    }
}
