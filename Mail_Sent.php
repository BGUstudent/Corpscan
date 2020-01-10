<?php include 'translate.php' ?>
<?php include 'Forgotten_Password.php' ?>
<head>
	<meta http-equiv="refresh" content="5;URL=index.php<?php if ($lang=='fr'){echo "?lang=fr";}?>" />
</head>
<body>
<p><?php echo $translate[$lang]["mailSent"] . $_SESSION['email'] ?></p>

<p align="center"><?php echo $translate[$lang]["redirect"]?></p>

</body>