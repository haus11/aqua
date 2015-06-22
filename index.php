<?php
	error_reporting(0);

	$apiEndpoint = "http://193.174.232.89:8080/fheapp/api/fhe/aqua";
	
	// Setup curl to request the api endpoint
	$curlHandle = curl_init();
	
	curl_setopt($curlHandle, CURLOPT_URL, $apiEndpoint);
	curl_setopt($curlHandle, CURLOPT_RETURNTRANSFER, 1);
	
	$response = json_decode(curl_exec($curlHandle));
	
	curl_close($curlHandle);
	
	$status = array(
		'class' => $response->open ? 'open' : 'closed',
		'label' => $response->open ? 'GEÖFFNET' : 'GESCHLOSSEN',
	);
?>
<!doctype html>
<html lang="de">
<head>
  <meta charset="utf-8">
  <!-- Mobile settings -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="HandheldFriendly" content="True">
  <meta http-equiv="cleartype" content="on">
  <meta name="mobile-web-app-capable" content="no">

  <!-- Seo settings -->
  <meta name="title" content="Ist das Café Aqua gerade geöffnet?">
  <meta name="description" content="Haus 11, Raum 11.E.30 ✅ Du suchst frischen Kaffee, ein kühles Getränk oder willst einfach nur kickern? Den aktuellen Öffnungsstatus des Café Aqua an der FH Erfurt findest auch in der App.">

  <!-- Homescreen images -->
  <link rel="apple-touch-icon" sizes="57x57" href="img/apple-icon-57x57.png">
  <link rel="apple-touch-icon" sizes="60x60" href="img/apple-icon-60x60.png">
  <link rel="apple-touch-icon" sizes="72x72" href="img/apple-icon-72x72.png">
  <link rel="apple-touch-icon" sizes="76x76" href="img/apple-icon-76x76.png">
  <link rel="apple-touch-icon" sizes="114x114" href="img/apple-icon-114x114.png">
  <link rel="apple-touch-icon" sizes="120x120" href="img/apple-icon-120x120.png">
  <link rel="apple-touch-icon" sizes="144x144" href="img/apple-icon-144x144.png">
  <link rel="apple-touch-icon" sizes="152x152" href="img/apple-icon-152x152.png">
  <link rel="apple-touch-icon" sizes="180x180" href="img/apple-icon-180x180.png">
  <link rel="icon" type="image/png" sizes="192x192"  href="img/android-icon-192x192.png">
  <link rel="icon" type="image/png" sizes="32x32" href="img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="img/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon-16x16.png">
  <link rel="manifest" href="/manifest.json">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="img/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">  

<style>
		body {
		  font-family: Arial, Helvetica, sans-serif;
		  padding: 0;
		  margin: 0;
                  color: #333;
		  box-sizing: border-box;
		}
		header { 
			text-align: center; 
		}
		
		.logo {
			max-width: 400px;
			width: 100%;
		}
		
		.status-label {
			font-size: 34px;
			letter-spacing: 2px;
			margin: 15px 0;
		}
		
		.status-label.open {
			color: #4caf50;
		}		
		
		.status-label.closed {
			color: #f44336;
		}

		.more-info {
			text-align: center;
			padding: 0px 15px;
		}
		
		blockquote {
			padding: 10px 20px;
			margin: 0px 0px 20px;
			font-size: 16px;
			border-left: 5px solid #EEE;
			text-align: left;
			display: inline-block;	
		}

		blockquote footer {
			display: block;
			font-size: 75%;
			color: #777;		
		}

		blockquote footer:before {
			content: "— ";		
		}

		aside { 
			padding: 0 8px;
			text-align: center;
			margin: 20px 0;
		}
		
		@media only screen and (min-width: 480px) {
			.status-label {
				font-size: 48px;
			}
		}

  </style>
  <title>Café Aqua</title>
</head>
<body>
	<header>
		<h1 class="status-label <?php echo $status['class'] ?>"><?php echo $status['label'] ?></h1>
		<img class="logo" src="img/logo-cafe-aqua-fh-erfurt.jpg" alt="Logo Café Aqua - FH Erfurt" title="Logo Café Aqua - FH Erfurt">
	</header>
	<aside>
		<blockquote>
		  <p>
Coffee should be black as hell, strong as death and sweet as love.</p>
		  <footer>Türkisches Sprichwort (Kahve dediğin cehennem gibi kara, ölüm gibi sert ve aşk gibi tatlı olmalı.)</footer>
		</blockquote>
	</aside>
	<section class="more-info">
		<p>Mehr Informationen findest du auch auf unserer <a href="https://www.facebook.com/Cafe.Aqua">Facebook Fanpage</a>.</p>
	</section>
</body>
</html>
