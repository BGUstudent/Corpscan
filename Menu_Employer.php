<?php include 'translate.php' ?>

<?php
	session_start();
	if($_SESSION['accred']!=2){
									   header("Location:index.php");
									};
?>

<html lang="fr">
	<head>
		<link rel="stylesheet" href="menu.css">
		<title>CorpsScan</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body>

<!-- Begin Header -->
		<?php include 'Header.php' ?>
<!-- End Header -->
<!-- BEGIN Menu -->
	<div id="menu"> 
		<ul>
			<li><a href="Menu_Employer.php<?php if ($lang=='fr'){echo "?lang=fr";}?>"><?php echo $translate[$lang]['Home']?></a>
			</li>
			<li><a href="Stat_Employer.php<?php if ($lang=='fr'){echo "?lang=fr";}?>"><?php echo $translate[$lang]['stat']?></a>
				<ul>
					<li><a href="Filtre_Employer.php<?php if ($lang=='fr'){echo "?lang=fr";}?>"><?php echo $translate[$lang]['filter']?></a></li>
					<li><a href="Sub_Item_2_Employer.php<?php if ($lang=='fr'){echo "?lang=fr";}?>">Sous-item 2</a></li>
					<li><a href="Sub_Item_3_Employer.php<?php if ($lang=='fr'){echo "?lang=fr";}?>">Sous-item 3</a></li>
				</ul>
			</li>
			<li><a href="Legal_Mention_Employer.php<?php if ($lang=='fr'){echo "?lang=fr";}?>"><?php echo $translate[$lang]['legal notice']?></a></li>
			<li><a href="Droits_Employer.php<?php if ($lang=='fr'){echo "?lang=fr";}?>"><?php echo $translate[$lang]['rights']?></a></li>
		</ul>
	</div>
<!-- End Menu -->

<!--		<form method="post" action="logout.php<?php if ($lang=='fr'){echo "?lang=fr";}?>">
				<input type="submit" name="submit" value="<?php echo $translate[$lang]['logout']?>" action="logout.php<?php if ($lang=='fr'){echo "?lang=fr";}?>" id="logout">
			</form> -->

	</body>
</html>