<?php

namespace App\Repositories\Booking;

use App\Booking;

class BookingRepository implements BookingRepositoryInterface {
	
	public function all() {
	
		return Booking::with('user')->latest()->get();
	
	}

	public function find($id) {
	
		return Booking::with('user')->findOrFail($id);
	
	}

	public function store($data) {

		return Booking::create($data);
	
	}

	public function update($id, $data) {
		
		$Booking = $this->find($id);
		
		$Booking->fill($data);
		
		$Booking->save();

	}

	public function delete($id) {

		$Booking = $this->find($id);
		
		$Booking->delete();

	}


}