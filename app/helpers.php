<?php

function flash($title = null, $message = null)
{
	$flash = app('App\Http\Flash');
	if( func_num_args() == 0 )
	{
		return $flash;
	}

	return $flash->info($title, $message);
}

function currentCurrency() {

    if( empty( session('currency') ) ) {

        session(['currency' => 'AED']);
    	
    	return session('currency');
    	
    }

    return session('currency');
}

/**
 * Display the converted amount and currency format
 */
function convertedAmountWithCurrency($amount) {

	$converter = app('App\CurrencyConverter\CurrencyConverter');

	$result = $converter->convert($amount, currentCurrency());
	
	$formattedResult = number_format(floor($result));

	$html = $formattedResult . '&nbsp; <span class="current-currency">' . currentCurrency() .'</span>';

	return $html;

}

/**
 * Convert the amount in USD for Stripe payment
 */
function convertAmountInUSD($amount) {

	$toCurrency = 'USD';

	$converter = app('App\CurrencyConverter\CurrencyConverter');

	return $converter->convert($amount, $toCurrency);

}

function photoUrl($path) {
	return '<img src="'. asset($path) .'" 
			alt="" 
			title=""
			class="responsive-img" />';
}

function display($photos, $class='', $width = '') {
	if( count($photos) > 0 ) {
		foreach( $photos as $photo ) {
			return '<img src="'. asset('/images/uploads/'.$photo->path) .'" 
					alt="'.$photo->imageable->name .'" 
					title="'.$photo->imageable->name.'" 
					width="'.$width.'"
					class="responsive-img '.$class.'" />';
		}

	} else {
		return defaultImage();
	}
}

function displayAll($photos, $class='') {
	if( count($photos) > 0 ) {
		$html = '';
		foreach( $photos as $photo ) {
			$html .= '<img src="'. asset('/images/uploads/'.$photo->path) .'" 
					alt="'.$photo->imageable->name .'" 
					title="'.$photo->imageable->name.'" 
					class="responsive-img '.$class.'" />';
		}

		return $html;
		
	} else {
		return defaultImage();
	}
}

function getUploadedPhoto($filename) {
	if( ! empty($filename) ) {
		return '<img src="'.asset('images/uploads'. $filename).'" 
					alt="" 
					title=""
					class="responsive-img" />';
	} else {
		return defaultImage($title);
	}
}

function getPhoto($filename, $title = "Eclipse Tourism") {
	if( ! empty($filename) ) {
		return '<img src="'.asset('images/'. $filename).'" 
					alt="'. $title.'" 
					title="'.$title .'"
					class="responsive-img" />';
	} else {
		return defaultImage($title);
	}
}

function defaultImage($title = "Eclipse Tourism") {
	return '<img src="'.asset('/images/default.png').'" 
				alt="'. $title.'" 
				title="'.$title .'" 
				class="img-responsive" />';
}