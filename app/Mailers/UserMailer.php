<?php
namespace App\Mailers;

use App\Repositories\User\UserRepositoryInterface;
use App\User;

class UserMailer extends Mailer {	

	protected $user;

	public function __construct(UserRepositoryInterface $user) {
		$this->user = $user;
	}

	public function sendBookingConfirmation($user) {
		
		$subject = 'Booking Confirmation #';
		$view = 'emails.booking-confirmation';

		$data = $this->user->find($user->id)->toArray();

		$this->sendTo($user->email, $subject, $view, $data);

	}

	public function bookingWasNotSuccessful($user) {

		$subject = 'Your booking was not successfully processed.';
		$view = 'emails.successful-booking';
		$data = [];

		$this->sendTo($user->email, $subject, $view, $data);

	}	

}