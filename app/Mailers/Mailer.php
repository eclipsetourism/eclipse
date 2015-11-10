<?php

namespace App\Mailers;

use Illuminate\Support\Facades\Mail;

abstract class Mailer {

	public function sendTo($email, $subject, $view, $data = []) {

		Mail::send($view, $data, function($message) use($email, $subject) {
			$message->to($email)
					->subject($subject);
					
		});

	}

}