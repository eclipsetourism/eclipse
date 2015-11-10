
@inject('cart', 'App\ShoppingCart\ShoppingCart')

<div class="row">

	<div class="col m12">
		@include('errors.forms')
	</div>
	
	<div class="col m8">

		<form method="POST" action="{{ route('checkout') }}" id="billing-form">

			{!! csrf_field() !!}		
		
			@include('public.billing._contact-information')				
	
			@include('public.billing._billing-information')		

			@include('public.billing._submit-button')	

		</form>
						
	</div>


	<div class="col s12 m4">

		@include('public.billing._orders')

	</div>
						
</div>	