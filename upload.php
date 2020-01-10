<?php include 'translate.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
<?php	include 'Menu_Admin.php'; ?>

<?php
  // chemin serveur :
  $target_dir = "/home/postfutur/www/corpscan/uploads/"; //où va le fichier?
  // chemin local : 
  // $target_dir = "/var/www/html/corpscan/uploads/"; //où va le fichier?

  $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); //définir son nom complet (avec chemin d'accès)
  // Check if file already exists
  if (file_exists($target_file)) {
      echo "Sorry, file already exists.";
  } else {    
      if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) { // on le move
      echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
      } else {
          echo "Sorry, there was an error uploading your file.";
      }}
  //@ Warning: fgetcsv() expects parameter 1 to be resource, string given.
  @fgetcsv($target_file, 1000, ","); //on récupère le fichier (max 1000 caractère ',' est le séparateur)
  $h = fopen($target_file, "r"); //on l'ouvre (r = reading)
  $data = fgetcsv($h, 1000, ","); //on demande de lire une ligne
  $CSVarray = []; 

  if (($h = fopen($target_file, "r")) !== FALSE){
    while (($data = fgetcsv($h, 1000, ",")) !== FALSE)  // boucle pour répêter l'opération sur chaque ligne
    {
      $CSVrows[]=$data; // Each individual array is being pushed into the nested array
    }
  fclose($h); // fucking close the file !
  }

  try{
    $connexion = new PDO('mysql:host=mysql-postfutur.alwaysdata.net; dbname=postfutur_corpscan; charset=utf8', 'postfutur', 'Simplon2020',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $stmtA = $connexion->prepare("INSERT INTO Users (First_Name_User, Name_User, Email_User, Id_Accreditation, Id_Company, Id_Department, Password_User) VALUES (?, ?, ?, ?, ?, ?, ?)");

    foreach($CSVrows as $CSVrow)
    {
        $stmtA->execute($CSVrow);
    }
      echo "<br> Users has been added to the database";

    }catch (PDOException $error){ 
    echo $error->getMessage();
  }
?>

</body>
</html>