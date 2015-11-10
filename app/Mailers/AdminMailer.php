<?php
namespace App\Mailers;

use App\Repositories\User\UserRepositoryInterface;
use App\User;

class AdminMailer extends Mailer {	

	protected $user;

	public function __construct(UserRepositoryInterface $user) {
		$this->user = $user;
	}

	public function newCustomerBooking($user) {

		$subject = 'New Online Booking was made';
		$view = 'emails.admin.new-booking';
		$data = $this->user->find($user->id)->toArray();
		$adminEmail = env('ADMIN_EMAIL');

		$this->sendTo($adminEmail, $subject, $view, $data);

	}

}