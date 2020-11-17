<?php

function get_random( $choices ) {
		return $choices[ array_rand( $choices, 1 ) ];
}

function is_it_snowing() {
	$weather = json_decode( file_get_contents( 'https://api.openweathermap.org/data/2.5/weather?q=milwaukee&units=imperial&APPID=14067ca47d30fb0bcb278f67509d646d' ), true );

	if ( isset( $weather['snow'] ) ) {
		return '<div>' . get_random( [ 'Yup.', 'Yeah.', 'Yah.', 'Yes.' ] ) . '<p>Looks like some ' . lcfirst( $weather['weather']['description'] ) . '</div>';
	}

	return '<div>' . get_random( [ 'Nope.', 'No.', 'Naw.' ] ) . '</div>';
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
	<meta name="generator" content="isitsnowinginmilwaukee">
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
		html, body {
			font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
  			background: #f2f2f2;
		}

		main {
			min-height: 60vh;
			display: flex;
			justify-content: center;
			align-items: center;
		}

		div {
  			text-align: center;
  			font-size: 60px;
		}

		p {
			font-size: 20px;
   			margin-top: 20px;
		}

		a {
			position: absolute;
			right: 0;
			bottom: 0;
			color: grey;
   			text-decoration: none;
			font-size: 20px;
			padding: 15px;
		}
	</style>
</head>
<body>
	<main><?php echo is_it_snowing(); ?><main>
	<a href="http://bradparbs.com" class="credits">a brad parbs thing</a>
	<!-- https://github.com/bradp/isitsnowinginmilwaukee -->
</body>
