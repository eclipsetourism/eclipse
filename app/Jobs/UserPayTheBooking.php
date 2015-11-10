<?php

namespace App\Jobs;

use App\Billings\BillingGateway;
use App\Jobs\Job;
use App\Mailers\AdminMailer;
use App\Mailers\UserMailer;
use App\Repositories\User\UserRepositoryInterface;
use App\ShoppingCart\ShoppingCart;
use Illuminate\Contracts\Bus\SelfHandling;

class UserPayTheBooking extends Job implements SelfHandling
{
    protected $name;

    protected $email;

    protected $phone;

    protected $city;

    protected $country;

    protected $stripeToken;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($name, $email, $phone, $city, $country, $stripeToken)
    {
        $this->name = $name;
        $this->email = $email;
        $this->phone = $phone;
        $this->city = $city;
        $this->country = $country;
        $this->stripeToken = $stripeToken;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(
        UserRepositoryInterface $userRepository, 
        BillingGateway $gateway,
        ShoppingCart $cart, 
        AdminMailer $adminMailer,
        UserMailer $userMailer) 
    {
        $data = [
            'name'  => $this->name,
            'email' => $this->email,
            'phone' => $this->phone,
            'city'  => $this->city,
            'country'   => $this->country
        ]; 

        $user = $userRepository->store($data);

        $chargeWasSuccessful = $gateway->charge($user, $cart->total(), $this->stripeToken);

        if( $chargeWasSuccessful ) {

            $booking = $user->bookings()->create([
                'status'        => 'pending',
                'comments'      => ''
            ]); 

            foreach( $cart->content() as $item ) {

                $packageId = $item->options->package->id;
                $quantity = $item->qty;
                $child_quantity = $item->options->child_quantity;

                $booking->packages()->attach($packageId, [
                    'adult_quantity'    => $quantity,
                    'child_quantity'    => $child_quantity,
                    'date'              =>  $item->options->date,
                    'date_submit'       =>  $item->options->date_submit                    
                    ]);       
            }

            $cart->destroy();

            //fire off an email to send the booking reference to the customer.
            $userMailer->sendBookingConfirmation($user);
            
             //fire off an email to send the booking notification to admin
            $adminMailer->newCustomerBooking($user);

        } else {

            $userMailer->bookingWasNotSuccessful($user);

            /**
             * If payment is unsuccessful, delete the user to avoid duplicating his/her record on the "users" table
             */
            $userRepository->delete($user->id);

        }


    }
}
