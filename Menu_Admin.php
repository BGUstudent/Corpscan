<?php include 'translate.php'; ?>
<?php
	session_start();
	if($_SESSION['accred']!=1)	{
									   header("Location:index.php");
									};
?>

<html lang="fr">
	<head>
		<link rel = "stylesheet" type = "text/css" href = "index.css" />
		<link rel = "stylesheet" type = "text/css" href = "menu.css" />
		<title>CorpsScan</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	
	<body>

<!-- Begin Header -->
<div>
	<div>	
		<?php include 'Header.php' ?>
	</div>		
	<div>
	</br>
	</br>
		<?php 
			$Selected_Id_Company = $_SESSION['company'];
			$connexion = new PDO('mysql:host=mysql-postfutur.alwaysdata.net; dbname=postfutur_corpscan; charset=utf8', 'postfutur', 'Simplon2020',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
			$companyName = $connexion->query("SELECT Name_Company FROM Company WHERE Id_Company = '$Selected_Id_Company'");
			$companyName = $companyName->fetch();
			echo $companyName['Name_Company'];
		?>
	</div>
</div>
<!-- End Header -->
<div>
<!-- BEGIN Insert logo and User Type -->
	<div>
		<?php echo $translate[$lang]['Admin_Menu']?>
	</div>
<!-- END Insert logo and User Type -->

<!-- BEGIN Menu -->
	<div id="menu"> 
		<ul>
			<li><a href="Menu_Admin.php<?php if ($lang=='fr'){echo "?lang=fr";}?>"><?php echo $translate[$lang]['Home']?></a>
			</li>
			<li><a href="Stat_Admin.php<?php if ($lang=='fr'){echo "?lang=fr";}?>"><?php echo $translate[$lang]['stat']?></a>
				<ul>
					<li><a href="Filter_Admin.php<?php if ($lang=='fr'){echo "?lang=fr";}?>"><?php echo $translate[$lang]['filter']?></a></li>
					<li><a href="SI1_Admin.php"><?php echo $translate[$lang]['SI1']?></a></li>
					<li><a href="Sub_Item3_Stat_Admin.php<?php if ($lang=='fr'){echo "?lang=fr";}?>">Sous-item 3</a></li>
				</ul>
			</li>
			<li><a href="Questions_Admin.php<?php if ($lang=='fr'){echo "?lang=fr";}?>">Questions</a>
				<ul>
					<li><a href="Question_Sub_Item1_Admin.php<?php if ($lang=='fr'){echo "?lang=fr";}?>">Sous-item 1</a></li>
					<li><a href="Question_Sub_Item2_Admin.php<?php if ($lang=='fr'){echo "?lang=fr";}?>">Sous-item 2</a></li>
					<li><a href="Question_Sub_Item3_Admin.php<?php if ($lang=='fr'){echo "?lang=fr";}?>">Sous-item 3</a></li>
				</ul>
			</li>
			<li><a href="Company_Admin.php<?php if ($lang=='fr'){echo "?lang=fr";}?>"><?php echo $translate[$lang]['company']?></a></li>
			<li><a href="Sign_Up_Admin.php<?php if ($lang=='fr'){echo "?lang=fr";}?>"><?php echo $translate[$lang]['user']?></a></li>
			<li><a href="Legal_Notice_Admin.php<?php if ($lang=='fr'){echo "?lang=fr";}?>"><?php echo $translate[$lang]['legal notice']?></a></li>
			<li><a href="Right_Admin.php<?php if ($lang=='fr'){echo "?lang=fr";}?>"><?php echo $translate[$lang]['rights']?></a></li>
			<li><a href="Themes_Admin.php<?php if ($lang=='fr'){echo "?lang=fr";}?>"><?php echo $translate[$lang]['themes']?></a></li>
		</ul>
	</div>
<!-- End Menu -->
</div>
<!--		<form method="post" action="../logout.php<php if ($lang=='fr'){echo "?lang=fr";}?>">
				<input type="submit" name="submit" value="<php echo $translate[$lang]['logout']?>" action="../logout.php<?php if ($lang=='fr'){echo "?lang=fr";}?>" id="logout">
			</form> -->

	</body>
</html>