<?php include 'translate.php'; ?>
<html lang="fr">
	<head>
		<title>CorpsScan</title>
		<link rel = "stylesheet" type = "text/css" href = "index.css" />
		<link rel = "stylesheet" type = "text/css" href = "menu.css" />
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta http-equiv="refresh" content="5;URL=index.php<?php if ($lang=='fr'){echo "?lang=fr";}?>" />
	</head>
	
	<body>
		<div>
			<?php include 'Header2.php' ?>
		</div>
		<div>
			<p align="center">
				<?php
					session_start();
					session_destroy();
					echo $translate[$lang]["disconnected"];
				?>
			</p>
		</div>
		<div>
			<p align="center">
				<br>
				<a href="index.php<?php if ($lang=='fr'){echo "?lang=fr";} ?>">
					<?php echo $translate[$lang]["back"] ?>
				</a>
			</p>
		</div>
		<div>
			<p align="center">
				<?php echo $translate[$lang]["redirect"] ?>
			</p>
		</div>
	</body>
</html>