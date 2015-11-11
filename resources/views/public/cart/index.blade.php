@extends('public.layouts.public')

@section('pageTitle', 'Shopping Cart')

@section('body_class', 'page')

@section('content')
	<div class="container">
		<div class="row">
			<div class="col m12">
				<h1 class="page__title">Shopping Cart</h1>

				<div class="page__description">

					@if( count($cart) > 0 )

						@include('public.partials._cart', ['editable'=> true])
					
					@else

						<p class="">
							You don't have an item in your cart.
							<a href="{{ route('packages') }}">Book a package now.</a>
						</p>

					@endif
				</div>

			</div>
		</div>
	</div>
@endsection