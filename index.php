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
	<!-- Piwik -->
	<script type="text/javascript">
	  var _paq = _paq || [];
	  _paq.push(['trackPageView']);
	  _paq.push(['enableLinkTracking']);
	  (function() {
	    var u="//stats.parbs.me/";
	    _paq.push(['setTrackerUrl', u+'piwik.php']);
	    _paq.push(['setSiteId', 6]);
	    var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
	    g.type='text/javascript'; g.async=true; g.defer=true; g.src=u+'piwik.js'; s.parentNode.insertBefore(g,s);
	  })();
	</script>
	<noscript><p><img src="//stats.parbs.me/piwik.php?idsite=6" style="border:0;" alt="" /></p></noscript>
	<!-- End Piwik Code -->

</body>
</html>
