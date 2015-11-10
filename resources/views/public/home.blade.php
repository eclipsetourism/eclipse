@extends('public.layouts.public')

@section('pageTitle', 'Home')

@section('header_styles')
	<link rel="stylesheet" href="{{ elixir('css/hero-slider.css') }}" />
@endsection

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
			<div class="col s12">
				
				<h3>Packages</h3>
				
				@include('public.partials._packages')

			</div>
		</div>
	</div>
@endsection

@section('footer_scripts')
	<script src="{{ elixir('js/hero-slider.js') }}"></script>
@endsection