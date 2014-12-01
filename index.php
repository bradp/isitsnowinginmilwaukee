<?php
function is_it_snowing(){
	$weather = json_decode( file_get_contents( "http://api.openweathermap.org/data/2.5/weather?q=milwaukee,wi" ), true  );
	if( !$weather['weather']['description'] ){
		return 'Nope.';
	}
	if( ( string_contains( strtolower( $weather['weather']['description'] ), 'snow' ) ) || string_contains( strtolower( $weather['weather']['main'] ), 'snow' ) ) {
		return 'Yup.';
	} else {
		return 'Nope.';
	}
}

function string_contains( $string, $substring ) {
	if( strpos( $string, $substring ) === false ) { return false; } else { return true; }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Is it snowing in Milwaukee?</title>
	<style>
		span{
			font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
			font-weight: 300;
			font-size: 15em;
			text-align: center;
			display: block;
		}
		a{
			font-family: "HelveticaNeue-Light", "Helvetica Neue Light", "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
			font-weight: 300;
			position: absolute;
			right: 0;
			bottom: 0;
			font: .75em;
		}
	</style>
</head>
<body>
	<span><?php echo is_it_snowing(); ?></span>
	<a href="http://bradparbs.com" class="credits">a brad parbs thing</a>
</body>
</html>
