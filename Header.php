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
			
<!-- BEGIN Logout Button -->

		<div class="logout" align="right">
			<form method="post" action="logout.php<?php if ($lang=='fr'){echo "?lang=fr";}?>">
				<input type="submit" name="submit" value="<?php echo $translate[$lang]['logout']?>" action="logout.php<?php if ($lang=='fr'){echo "?lang=fr";}?>" id="logout">
			</form>
		</div>
		
<!-- END Logout Button -->
		</div>
		</br>
<!-- END Insert logo and languages flags -->



<!-- END header -->
	</body>
</html>