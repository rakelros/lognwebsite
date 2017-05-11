<?php # $destination = "http://". $_SERVER['HTTP_HOST'] . $_SERVER['HTTP_URI'] . ""; ?>
<?php  $destination = "http://lognweb.herokuapp.com/iceland.html"; ?>
<?php
# prevent cache
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");
?>
<!-- <!DOCTYPE HTML> -->
<!--
	Solid State by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Logn Iceland</title>
		<script type="text/javascript">
            		function redirect() { setTimeout(function(){window.location = "/captiveportal/index.php";},100);} 
        	</script>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
		<link rel="stylesheet" href="assets/css/animate.css" />
		<link rel="stylesheet" href="assets/css/main.css" />
		<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	</head>
	<body>

		<!-- Page Wrapper -->
			<div id="page-wrapper">

				<!-- Header -->
					<header id="header" class="alt">
						<h1><a target="_blank" href="iceland.html">Logn Iceland</a></h1>
						<nav>
							<a target="_blank" href="#menu">Menu</a>
						</nav>
					</header>

				<!-- Menu -->
					<nav id="menu">
						<div class="inner">
							<h2>Menu</h2>
							<ul class="links">
								<li><a target="_blank" href="http://lognweb.herokuapp.com/iceland.html">Open this page in the browser</a></li>
								<li><a target="_blank" href="http://lognweb.herokuapp.com">Logn Home</a></li>
							</ul>
							<a href="#" class="close">Close</a>
						</div>
					</nav>

				<!-- Banner -->
					<section id="banner" class="animated bgshrink">
						<div class="inner">
							<h2>Welcome to Iceland</h2>
						</div>
					</section>

				<!-- Wrapper -->
					<section id="wrapper">

						<section id="one" class="wrapper spotlight style1">
							<div class="inner">
								<div class="content animated fadeIn">
									<div class="features">
										<!-- weather -->
										 <?php 
										 	$response = file_get_contents('https://apis.is/weather/forecasts/en?stations=1');
											$forecast = json_decode($response, true);
											$time = 6;  # hom many entries into the future
											$image = "./assets/weather/cloudy.png";
										 	echo '<article class="card small animated fadeInRight" style="background-image: url(\''.$image.'\');">';
											echo '	<div class="card-content">';
											echo '		<span class="card-title activator grey-text text-darken-4">Weather in Reykjavík</span>';
											echo '		<p>';
											echo "			The forcast for ".gmdate('H:i',strtotime($forecast['results'][0]['forecast'][$time]['ftime']))." today is ".$forecast['results'][0]['forecast'][$time]['T']." °C, ".$forecast['results'][0]['forecast'][$time]['F']." m/s and ".strtolower($forecast['results'][0]['forecast'][$time]['W'])." with ".$forecast['results'][0]['forecast'][$time]['R']." mm/hour of precipitation";
											echo "		</p>"; 
											echo "	</div>";
											echo "</article>";
										?>
										<!-- sim card --><article class="card small animated fadeInRight" style="background-image: url('./images/coverage.png'); background-size: cover;">
											<div class="card-content">
												<span class="card-title activator grey-text text-darken-4">Best phone coverage</span>
											</div>
											<div class="card-action" style="background-color: transparent;">
												<a href="http://siminn.is">siminn.is</a>
											</div>
										</article>	
										<!-- currency --><article class="card small animated fadeInRight">
											<div class="card-content">
												<span class="card-title activator grey-text text-darken-4">Currency Conversion</span>
												<!-- IS THERE SOME WAY YOU CAN DO THIS? -->
												<p>Your country: 1CAD<br>Iceland: 80ISK</p>
												<p>Iceland: 1IDK<br>Your country: 5CAD</p>
												<!-- PLEASE PLEASE AND THNAK YOU :D -->
											</div>
											<div class="card-action">
												<a href="#">Currency conversion</a>
											</div>
										</article>										
									</div>
								</div>

								<div class="content animated fadeIn">
									<h2 class="major">Check for Unexpected Weather</h2>
									<p class="contentdesc">Please check the forcast of the places you travel to for sporatic and rough weather.</p>
									<a class="special seemore">See more</a>
									<div class="features">
										<article class="card small animated fadeInRight hidden">
											<div class="card-content">
												<span class="card-title activator grey-text text-darken-4">Sed feugiat lorem</span>
											</div>
											<div class="card-action">
												<a href="#">Advert link</a>
												<a href="#">Advert link</a>
											</div>
										</article>
										<!-- weather -->
										 <?php 
										 	$response = file_get_contents('https://apis.is/concerts');
											$concerts = json_decode($response, true);
											$x = 0; #num upcoming conert
										 	echo '<article class="card small animated fadeInRight" style="background-image: url(\''.$concerts['results'][$x]['imageSource'].'\');">';
											echo '	<div class="card-content">';
											echo '		<span class="card-title activator grey-text text-darken-4">Weather in Reykjavík</span>';
											echo '		<p>';
											echo "			Fun thing to do indoors! The next concert in Iceland is ".$concerts['results'][$x]["eventDateName"]." and is in ".$concerts['results'][$x]["eventHallName"]." at ".gmdate('H:i, d. M Y',strtotime($concerts['results'][$x]["dateOfShow"]));
											echo "		</p>"; 
											echo "	</div>";
											echo "</article>";
										?>
									</div>
								</div>
								<div class="content animated fadeIn">
									<h2 class="major">Watch for Dangers on the Road</h2>
									<p class="contentdesc">Please take precautions on the road and keep away from oncoming traffic, animals and weather conditions.</p>
									<a class="special seemore">See more</a>
									<div class="features">
										<article class="card small animated fadeInRight hidden">
											<div class="card-content">
												<span class="card-title activator grey-text text-darken-4">This is not an ad :D</span>
											</div>
											<div class="card-action">
												<a href="#">Advert link</a>
												<a href="#">Advert link</a>
											</div>
										</article>
										<article class="card small animated fadeInRight hidden">
											<div class="card-content">
												<span class="card-title activator grey-text text-darken-4">This is an ad :)</span>
											</div>
											<div class="card-action">
												<a href="#">Advert link</a>
												<a href="#">Advert link</a>
											</div>
										</article>
										<article class="card small animated fadeInRight hidden">
											<div class="card-content">
												<span class="card-title activator grey-text text-darken-4">This is an ad :)</span>
											</div>
											<div class="card-action">
												<a href="#">Advert link</a>
												<a href="#">Advert link</a>
											</div>
										</article>
										<article class="card small animated fadeInRight hidden">
											<div class="card-content">
												<span class="card-title activator grey-text text-darken-4">This is an ad :)</span>
											</div>
											<div class="card-action">
												<a href="#">Advert link</a>
												<a href="#">Advert link</a>
											</div>
										</article>
									</div>
								</div>
								<div class="content animated fadeIn hidden">
									<h2 class="major">Preserve the Natural Environment</h2>
									<p class="contentdesc">Please preserve Icelandic moss as it is delicate and takes hundreds of years to grow back.</p>
									<a class="special seemore">See more</a>
									<div class="features">
										<article class="card small animated fadeInRight hidden">
											<div class="card-content">
												<span class="card-title activator grey-text text-darken-4">Sed feugiat lorem</span>
											</div>
											<div class="card-action">
												<a href="#">Advert link</a>
												<a href="#">Advert link</a>
											</div>
										</article>
										<article class="card small animated fadeInRight hidden">
											<div class="card-content">
												<span class="card-title activator grey-text text-darken-4">This is an ad :)</span>
											</div>
											<div class="card-action">
												<a href="#">Advert link</a>
												<a href="#">Advert link</a>
											</div>
										</article>
									</div>
								</div>
								<div class="content animated fadeIn hidden">
									<h2 class="major">Don't Hesitate to Ask Locals</h2>
									<p class="contentdesc">Please ask locals for help and information about Iceland throughout your stay.</p>
									<a class="special seemore">See more</a>
									<div class="features">
										<article class="card small animated fadeInRight hidden">
											<div class="card-content">
												<span class="card-title activator grey-text text-darken-4">Sed feugiat lorem</span>
											</div>
											<div class="card-action">
												<a href="#">Advert link</a>
												<a href="#">Advert link</a>
											</div>
										</article>
										<article class="card small animated fadeInRight hidden">
											<div class="card-content">
												<span class="card-title activator grey-text text-darken-4">This is an ad :)</span>
											</div>
											<div class="card-action">
												<a href="#">Advert link</a>
												<a href="#">Advert link</a>
											</div>
										</article>
									</div>
								</div>
								<p class="moretips">... More Tips ...</p>
							</div>
						</section>

					</section>

				<!-- Footer -->
					<section id="footer">
						<div class="inner">
							<p>
								Have a safe stay in Iceland. To see these tips again please visit <a target="_blank" href="https://lognweb.herokuapp.com/iceland.html">logn.com/iceland</a>. 
							</p>
							<form method="post" action="/captiveportal/index.php" onsubmit="redirect()">
								<ul class="actions">
									<input type="hidden" name="target" value="<?=$destination?>">
									<button type="submit">Sign into WiFi</button>
								</ul>
							</form>
							<ul class="copyright">
								<li>To add your tips and your business to Logn, contact us at <a target="_blank" href="https://lognweb.herokuapp.com">logn.com</a></li>
								<li>&copy; Logn Inc. All rights reserved. Design: <a target="_blank" href="http://html5up.net">HTML5 UP</a>. Mods: <a target="_blank" href="www.arjunkalburgi.com">ASKalburgi</a></li>
							</ul>
						</div>
					</section>

			</div>

		<!-- Scripts -->
			<script src="assets/js/skel.min.js"></script>
			<script src="assets/js/jquery.min.js"></script>
			<script src="assets/js/jquery.scrollex.min.js"></script>
			<script src="assets/js/util.js"></script>
			<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
			<script src="assets/js/main.js"></script>

	</body>
</html>
