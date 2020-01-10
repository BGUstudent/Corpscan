<!DOCTYPE html>

<?php include 'translate.php' ?>
<?php
	session_start();
	if($_SESSION['accred']!=1)	{
									   header("Location:index.php");
									};
									?>
<html lang="fr">
	<head>
		<link rel = "stylesheet" type = "text/css" href = "index.css" />
		<title>Login</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
	</head>

	<body>
<!-- BEGIN Insert logo and languages flags -->
<!--		<img src="Pictures/Corpscan_Logo.png" alt="Logo CorpScan" id="logo" >
		<div class="flag">
			<a href='index.php?lang=fr' target='_self'><img src='Pictures/Fr_Flag.png'></a>
			<a href='index.php' target='_self'><img src='Pictures/Uk_Flag.png'></a>
		</div> -->
		<div>
			<?php include 'Header.php' ?>
		</div>
<!-- END Insert logo and languages flags -->
<form method="post">
<fieldset>
<legend><?php echo $translate[$lang]['select']?></legend>
<div class="form-example">
    <label for="Company"><?php echo $translate[$lang]['company']?></label>
    <select name="companies" id="company-select">
    <?php 
      try
      {
        $connexion = new PDO('mysql:host=mysql-postfutur.alwaysdata.net; dbname=postfutur_corpscan; charset=utf8', 'postfutur', 'Simplon2020');
        $RCompany = "SELECT * FROM Company WHERE NOT (Id_Company = 1)";
        $company = $connexion->query($RCompany);                       
        $company->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $company->fetch()){
            echo '<option value="'.$row['Id_Company'].'">'.$row['Name_Company'].'</option>';
        }
      }
      catch (PDOException $e)
      {   
          die("Some problems getting data from database" . $e->getMessage());
      }
      ?>
  </select>
  </div>

  <div class="form-example">
    <input type="submit" value="<?php echo $translate[$lang]['submit']?>" name="submitC">
  </div>
  </fieldset>
</form>

<?php

if (isset($_POST['submitC'])) {
    $_SESSION['company'] = $_POST['companies'];
    if ($lang=='fr')
                    {
                        header('location:Menu_Admin.php?lang=fr');
                    }
    else
                    {
                        header('location:Menu_Admin.php');
                    }}
		?>
	</body>
</html>