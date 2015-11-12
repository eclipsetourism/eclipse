@extends('public.layouts.public')

@section('pageTitle', 'Complete Your Order')

@section('body_class', 'page')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col m12">
				<h1 class="page__title">Complete Your Order</h1>

				<div class="page__description">

					@if( count($cart) > 0 )

						@include('public.partials._checkoutForm')

					@else

						<p class="lead">
							You don't have an item in your cart. <a href="{{ route('packages') }}">Book your package now.</a>
						</p>

					@endif


				</div>

			</div>
		</div>
	</div>
@endsection

@section('footer_scripts')
	{{--<script src="https://js.stripe.com/v2/"></script>
	<script src="{{ elixir('js/billing.js') }}"></script> --}}

	<script src="https://www.2checkout.com/checkout/api/2co.min.js"></script>

	<script>
	    // Called when token created successfully.
	    var successCallback = function(data) {
	        var billingForm = document.getElementById('billing-form');

	        // Set the token as the value for the token input
	        //billingForm.token.value = data.response.token.token;

            $('<input>', {
                type: 'hidden',
                name: 'stripeToken',
                value: data.response.token.token
            }).appendTo(billingForm);	        

	        // IMPORTANT: Here we call `submit()` on the form element directly instead of using jQuery to prevent and infinite token request loop.
	        billingForm.submit();
	    };

	    // Called when token creation fails.
	    var errorCallback = function(data) {
	        if (data.errorCode === 200) {tokenRequest();} else {alert(data.errorMsg);}
	    };

	    var tokenRequest = function() {
	        // Setup token request arguments
	        var args = {
	            sellerId: "{{ env('TWOCHECKOUT_ACCOUNT_NUMBER') }}",
	            publishableKey: "{{ env('TWOCHECKOUT_PUBLIC_KEY') }}",
	            ccNo: $("#cc-number").val(),
	            cvv: $("#cvc").val(),
	            expMonth: $("#expiryMonth").val(),
	            expYear: $("#expiryYear").val()
	        };

	        // Make the token request
	        TCO.requestToken(successCallback, errorCallback, args);
	    };

	    $(function() {
	        // Pull in the public encryption key for our environment
	        TCO.loadPubKey('sandbox');

	        $("#billing-form").submit(function(e) {
	            // Call our token request function
	            tokenRequest();

	            // Prevent form from submitting
	            return false;
	        });
	    });
	</script>

@endsection