@extends('public.layouts.public')

@section('pageTitle', 'Home')

@section('header_styles')
	<link rel="stylesheet" href="{{ elixir('css/hero-slider.css') }}" />
	<link rel="stylesheet" href="{{ elixir('css/owl-carousel.css') }}" />
@endsection

@section('body_class', 'home')

@section('content')

	<section class="cd-hero">
		<ul class="cd-hero-slider "><!--autoplay-->

			<li class="cd-bg-video selected">
				<div class="cd-full-width">
					<h2>A Memorable Experience</h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
					<a href="{{ route('packages') }}" class="btn waves-effect waves-light">View our Packages</a>
				</div>

				<div class="cd-bg-video-wrapper" data-video="{{ asset('videos/video') }}">
					<!-- video element will be loaded using jQuery -->
				</div>
			</li>
		</ul>
	</section>

	<div class="container">
		<div class="row">
			<div class="col s12 m12">
				<div class="white-background">
					<div class="row center-content">
						<div class="col s12 m8">
							{!! getPhoto('home-slide1.jpg') !!}
						</div>

						<div class="col s12 m4">

							<div class="home__message">

								<h3 class="home__message__title">Lorem ipsum dolor sit amet.</h3>

								<p class="home__message__description">
									Ipsum has been the industry's standard dummy text ever since the 1500s.
								</p>

								<a href="#" class="btn waves-effect waves-light blue">See the latest offers</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col s12 m8">
				<div class="owl-carousel">
					<a href="{{ route('package', 'hot-air-balloon') }}">
						{!! getPhoto('hot-air-balloon.jpg', 'Hot Air Balloon Tour') !!}
					</a>

					<a href="{{ route('package', 'hot-air-balloon') }}">
						{!! getPhoto('hot-air-balloon.jpg', 'Hot Air Balloon Tour') !!}
					</a>
				</div>
			</div>

			<div class="col s12 m4">
				<div class="row">
					<div class="col s12 m12 mb-20">
						<div class="home__package">
							
							<a href="{{ route('package', 'dune-buggy-drive') }}"></a>

							{!! getPhoto('dune-buggy-drive-tour.jpg', 'Dune Buggy Drive Tour') !!}

							<h4 class="home__package__title white">Dune Buggy Drive</h4>

						</div>
					</div>
					<div class="col s12 m12">
						<div class="home__package">
							
							<a href="{{ route('package', 'ferrari-world-theme-park') }}"></a>

							{!! getPhoto('ferrari-world-tour.jpg', 'Ferrari World Tour') !!}

							<h4 class="home__package__title white">Ferrari World</h4>
				
						</div>		
					</div>					
				</div>
			</div>
		</div>

		<div class="row">

			<div class="col s12 m4">
				<div class="home__package">
					
					<a href="{{ route('package', 'desert-safari') }}"></a>

					{!! getPhoto('desert-safari-tour.jpg', 'Desert Safari Tour') !!}

					<h4 class="home__package__title white">Desert Safari</h4>
		
				</div>	
			</div>

			<div class="col s12 m4">
				<div class="home__package">
					
					<a href="{{ route('package', 'burj-khalifa') }}"></a>

					{!! getPhoto('burj-khalifa-tour.jpg', 'Burj Khalifa Tour') !!}

					<h4 class="home__package__title white">Burj Khalifa</h4>
		
				</div>		
			</div>

			<div class="col s12 m4">

				<div class="home__package">
					
					<a href="{{ route('package', 'dhow-dinner-cruise') }}"></a>

					{!! getPhoto('dhow-cruise-tour.jpg', 'Dhow Cruise Tour') !!}

					<h4 class="home__package__title white">Dhow Cruise</h4>
		
				</div>	
			</div>	

			<div class="col s12 m12">
				<p>&nbsp;</p>
				<p class="text-center">
					<a href="{{ route('packages') }}" class="btn waves-effect waves-light">view all packages</a>
				</p>
			</div>					
		</div>		
	</div>

@endsection

@section('footer_scripts')
	<script src="{{ elixir('js/hero-slider.js') }}"></script>
	<script src="{{ elixir('js/owl-carousel.js') }}"></script>
@endsection