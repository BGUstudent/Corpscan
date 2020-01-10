<!DOCTYPE html>
<html lang="fr">
	<head>
		<link rel = "stylesheet" type = "text/css" href = "index.css" />
		<title>Login</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
	</head>

	<body>
		<div class="header" >
<!-- BEGIN header -->

<!-- BEGIN Insert logo and languages flags -->

			<div class="Logo">
				<img src="Pictures/Corpscan_Logo.png" alt="Logo CorpScan" id="logo">
			</div>
			<div class="flag">
				<a href='<?php $_SERVER['REQUEST_URI'] ?>?lang=fr' target='_self'><img src='Pictures/Fr_Flag.png' alt="Drapeau Français"></a>
			</div>
			<div class="flag">
				<a href='<?php echo parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH); ?>' target='_self'><img src='Pictures/Uk_Flag.png' alt="Uk Flag"></a>
			</div>

		
<!-- END Insert logo and languages flags -->
<!-- END header -->
		</div>
		</br>
	</body>
</html>