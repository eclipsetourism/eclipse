<?php

namespace App\Billings;

use App\User;

interface BillingGateway {
	
	public function charge(User $user, $total, $token);
	
}