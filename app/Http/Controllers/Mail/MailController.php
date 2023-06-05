<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;

class MailController extends Controller
{
    public function requestCall(Request $request) {
        $name = $request->name;
        $phone = $request->phone;
        $question = '';
        if (isset($request->all()['question'])) {
            $question = $request->all()['question'];
        }

        $message = "<h3>Заказ обратного звонка:</h3>
                    <p>Имя: $name</p>
                    <p>Номер телефона: $phone</p>";

        if ($question) $message .= "<p>Вопрос: $question</p>";

        $mail = new PHPMailer;
        $mail->CharSet = 'UTF-8';

        $mail->isSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPDebug = 0;

        $mail->Host = 'ssl://smtp.yandex.ru';
        $mail->Port = 465;
        $mail->Username = 'main@htk25rus.ru';
        $mail->Password = config('app.yandex_key');

        $mail->setFrom('main@htk25rus.ru', 'Htk25rus.ru');
        $mail->addAddress('Bulatov757@yandex.ru');

        $mail->Subject = 'Заказ обратного звонка';

        $mail->msgHTML($message);

        $mail->send();

        return redirect()->back();
    }
}
