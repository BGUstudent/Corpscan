<?php include 'translate.php' ?>

<?php
session_start();
if($_SESSION['accred']!= 3){
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
		<div>
			<?php include 'Header.php' ?>
		</div>
<!-- End Header -->
<!-- BEGIN Insert logo and User Type -->
		<div>
			</br>
			</br>
			<span >
				<!-- Menu Utilisateur -->
			<?php echo $translate[$lang]['User_Menu']?>		
			</span>
		</div>
<!-- END Insert logo and User Type -->

<!-- BEGIN Menu -->
		<div id="menu"> 
			<ul>
				<li>
					<a href="Menu_User.php<?php if ($lang=='fr'){echo "?lang=fr";}?>"><?php echo $translate[$lang]['Home']?></a>
				</li>
				<li>
					<a href="Stats_User.php<?php if ($lang=='fr'){echo "?lang=fr";}?>"><?php echo $translate[$lang]['stat']?></a>
						<ul>
							<li>
								<a href="Stats_Filtre_User.php<?php if ($lang=='fr'){echo "?lang=fr";}?>"><?php echo $translate[$lang]['filter']?></a>
							</li>
							<li>
								<a href="Stats_Sub_Item_2_User.php<?php if ($lang=='fr'){echo "?lang=fr";}?>">Sous-item 2</a>
							</li>
							<li>
								<a href="Stats_Sub_Item_3_User.php<?php if ($lang=='fr'){echo "?lang=fr";}?>">Sous-item 3</a>
							</li>
						</ul>
					</li>
					<li><a href="Question_User.php<?php if ($lang=='fr'){echo "?lang=fr";}?>">Questions</a>
						<ul>
							<li><a href="Question_Sub_Item_1_User.php<?php if ($lang=='fr'){echo "?lang=fr";}?>">Sous-item 1</a></li>
							<li><a href="Question_Sub_Item_2_User.php<?php if ($lang=='fr'){echo "?lang=fr";}?>">Sous-item 2</a></li>
							<li><a href="Question_Sub_Item_3_User.php<?php if ($lang=='fr'){echo "?lang=fr";}?>">Sous-item 3</a></li>
						</ul>
					</li>
					<li><a href="Legal_Mention_User.php<?php if ($lang=='fr'){echo "?lang=fr";}?>"><?php echo $translate[$lang]['legal notice']?></a></li>
					<li><a href="Droits_User.php<?php if ($lang=='fr'){echo "?lang=fr";}?>"><?php echo $translate[$lang]['rights']?></a></li>
					<li><a href="Themes_User.php<?php if ($lang=='fr'){echo "?lang=fr";}?>"><?php echo $translate[$lang]['themes']?></a></li>
				</ul>
			</div>
<!-- End Menu -->

<!--<form method="post" action="logout.php<?php if ($lang=='fr'){echo "?lang=fr";}?>">
  <input type="submit" name="submit" value="<?php echo $translate[$lang]['logout']?>" action="logout.php<?php if ($lang=='fr'){echo "?lang=fr";}?>" id="logout">
</form> -->

	</body>
</html>