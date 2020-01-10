<?php include 'translate.php' ?>

<?php
session_start();
if(!isset($_SESSION['nameL'])){
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
</head>
<body>
<!-- BEGIN Menu -->
	<div id="menu">                
		<ul>
			<li><a href="Home_Admin.php"><?php echo $translate[$lang]['home']?></a>
			<li><a href="Stat_Admin.php"><?php echo $translate[$lang]['stat']?></a>
				<ul>
					<li><a href="Filter_Admin.php"><?php echo $translate[$lang]['filter']?></a></li>
					<li><a href="SI1_Admin.php"><?php echo $translate[$lang]['SI1']?></a></li>
					<li><a href="Sub_Item1_Admin.php">Sous_item1</a></li>
				</ul>
			</li>
			<li><a href="Questions_Admin.php">Questions</a>
				<ul>
					<li><a href="Sub_Item2_Admin.php">Sous_item2</a></li>_
					<li><a href="Sub_Item3_Admin.php">Sous_item3</a></li>
					<li><a href="Sub_Item4_Admin.php">Sous_item4</a></li>
				</ul>
			</li>
			<li><a href="Company_Admin.php"><?php echo $translate[$lang]['company']?></a></li>
			<li><a href="User_Admin.php"><?php echo $translate[$lang]['user']?></a></li>
			<li><a href="Legal_Notice_Admin.php"><?php echo $translate[$lang]['legal notice']?></a></li>
			<li><a href="Right_Admin.php"><?php echo $translate[$lang]['rights']?></a></li>
			<li><a href="Themes_Admin.php"><?php echo $translate[$lang]['themes']?></a></li>
		</ul>
	</div>
<!-- End Menu -->
</body>
</html>