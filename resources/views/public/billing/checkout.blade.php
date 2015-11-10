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
	<script src="https://js.stripe.com/v2/"></script>
	<script src="{{ elixir('js/billing.js') }}"></script>
@endsection