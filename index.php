<?php
function get_weather( $get_cache_time = false ) {

    // Get our file and cached time.
	$cache_file = dirname( __FILE__ ) . '/weather-cache.json';
    $cache_time = file_exists( $cache_file ) ? filemtime( $cache_file ) : 0;

    if ( $get_cache_time ) {
        return $cache_time;
    }

	if ( file_exists( $cache_file ) && $cache_time > ( time() - 60 * 5 ) ) {
		$file = file_get_contents( $cache_file );
	} else {
		$file = file_get_contents( 'https://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20weather.forecast%20where%20woeid%20in%20(select%20woeid%20from%20geo.places(1)%20where%20text%3D%22milwaukee%2C%20wi%22)&format=json&env=store%3A%2F%2Fdatatables.org%2Falltableswithkeys' );
		file_put_contents( $cache_file, $file );
	}

    return json_decode( $file, true );
}

function get_random( $choices ) {

	// If we didn't get an array, just send back what we had.
	if ( is_string( $choices ) ) {
		return $choices;
	}

	// Get a rand one from our array.
	$rand = array_rand( $choices );

	// Send it back.
	return isset( $choices[ $rand ] ) ? $choices[ $rand ] : $choices[0];
}

function get_no() {
	return get_random(
		array(
		'Nope.',
		'No.',
		'Naw.',
		)
	);
}

function get_yes() {
	return get_random(
		array(
		'Yup.',
		'Yeah.',
		'Yah.',
		'Yes.',
		)
	);
}

function get_later() {
	return get_random(
		array(
		'Nope, but probably later.',
		'No, maybe later.',
		'Nah, but later it will.',
		)
	);
}

function is_it_snowing() {

	$weather = get_weather();

	if ( ! (
		$weather
		&& isset( $weather['query'] )
		&& isset( $weather['query']['results'] )
		&& isset( $weather['query']['results']['channel'] )
		&& isset( $weather['query']['results']['channel']['item'] )
	) ) {
		return get_no();
	}

	if (
		isset( $weather['query']['results']['channel']['item']['condition'] )
		&& isset( $weather['query']['results']['channel']['item']['condition']['text'] )
		&& ( stripos( $weather['query']['results']['channel']['item']['condition']['text'], 'snow' ) !== false )
	) {
		return get_yes();
	}

	if (
		isset( $weather['query']['results']['channel']['item']['forecast'] )
		&& isset( $weather['query']['results']['channel']['item']['forecast'][0] )
		&& isset( $weather['query']['results']['channel']['item']['forecast'][0]['text'] )
		&& ( stripos( $weather['query']['results']['channel']['item']['forecast'][0]['text'], 'snow' ) !== false )
	) {
		return get_later();
	}

	return get_no();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">

	<title>Is it snowing in Milwaukee?</title>

	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link rel="shortcut icon" href="icon.png">

	<meta name="description" content="Easily check if it is snowing in Milwaukee, WI.">
	<meta name="generator" content="isitsnowinginmilwaukee-<?php echo get_weather( true ); ?>">
	<meta property="og:url" content="https://isitsnowinginmilwaukee.com">
	<meta property="og:type" content="website">
	<meta property="og:title" content="Is it snowing in Milwaukee?">
	<meta property="og:description" content="Easily check if it is snowing in Milwaukee, WI.">
	<meta property="og:site_name" content="Is it snowing in Milwaukee?">
	<meta property="og:locale" content="en_US">
	<meta property="og:image" content="http://isitsnowinginmilwaukee.com/icon.png">

	<meta name="twitter:card" content="summary">
	<meta name="twitter:site" content="@bradparbs">
	<meta name="twitter:creator" content="@bradparbs">
	<meta name="twitter:url" content="https://isitsnowinginmilwaukee.com">
	<meta name="twitter:title" content="Is it snowing in Milwaukee?">
	<meta name="twitter:description" content="Easily check if it is snowing in Milwaukee, WI.">
	<meta name="twitter:image" content="http://isitsnowinginmilwaukee.com/icon.png">

	<style>
		body {
			font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
			font-weight: 300;
			font-size: 15em;
		}
		span {
			text-align: center;
			display: block;
		}
		a {
			position: absolute;
			right: 0;
			bottom: 0;
			font-size: .07em;
		}
	</style>
</head>
<body>
	<span><?php echo is_it_snowing(); ?></span>
	<a href="http://bradparbs.com" class="credits">a brad parbs thing</a>
	<!-- https://github.com/bradp/isitsnowinginmilwaukee -->
</body>
</html>
