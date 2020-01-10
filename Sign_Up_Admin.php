<?php include 'translate.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="index.css" type="text/css" media="screen" />
</head>
<body>

<!-- BEGIN Include Menu -->
	<?php include 'Menu_Admin.php';	?>
<!-- End Include Menu -->

<form method="post" class="form-example" action="">
    <fieldset>
    <legend><?php echo $translate[$lang]['signup']?></legend>
  <div class="form-example">
    <label for="firstName"><?php echo $translate[$lang]['firstName']?></label>
    <input placeholder="First Name"type="text" name="firstName" id="firstName" required>
  </div>
  <div class="form-example">
    <label for="username"><?php echo $translate[$lang]['Name']?></label>
    <input placeholder="<?php echo $translate[$lang]['nameInput']?>"type="text" name="pseudo" id="pseudo" required>
  </div>
  <div class="form-example">
    <label for="password"><?php echo $translate[$lang]['password']?></label>
    <input placeholder="<?php echo $translate[$lang]['passwordInput']?>"type="password" name="pass" id="pass" required>
  </div>
  <div class="form-example">
    <label for="Email">Email</label>
    <input placeholder="Email"type="email" name="email" id="email" required>
  </div>

  <div class="form-example">
    <label for="Accréditation"><?php echo $translate[$lang]['Accreditation']?></label>
    <select name="accred" id="accred-select">
      <option value="2">Employer</option>
      <option value="3">User</option>
  </select>
  </div>

  <div class="form-example">
    <label for="password"><?php echo $translate[$lang]['department']?></label>
    <select name="department" id="department-select">
    <?php 
      try
      {
        $Selected_Id_Company = $_SESSION['company'];
        $connexion = new PDO('mysql:host=mysql-postfutur.alwaysdata.net; dbname=postfutur_corpscan; charset=utf8', 'postfutur', 'Simplon2020');
        $RDepartment = "SELECT * FROM Department_Company WHERE Id_Company='$Selected_Id_Company'";
        $department = $connexion->query($RDepartment);
        $department->setFetchMode(PDO::FETCH_ASSOC);
        while($y = $department->fetch()){
            echo '<option value="'.$y['Id_Department'].'">'.$y['Department_Name'].'</option>';
        }
      }
      catch (PDOException $e)
      {   
          die("Some problems getting data from database" . $e->getMessage());
      }
    ?>
  </select>
  </div>
</form>

<?php
if (isset($_POST['submit'])) {
    $firstName = $_POST['firstName'];
    $pseudo = $_POST['pseudo'];
    $pseudo = sanitize($pseudo);
    $email = $_POST['email'];
    $idAccred = $_POST['accred'];
    $idCompany = $_SESSION['company'];
    $idDepartment = $_POST['department'];
    $pass = $_POST['pass'];
    $pass = sanitize($pass);
    //$pass = md5($_POST['pass']);
  try{
    $connexion = new PDO('mysql:host=mysql-postfutur.alwaysdata.net; dbname=postfutur_corpscan; charset=utf8', 'postfutur', 'Simplon2020',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    $stmt=$connexion->query("SELECT * FROM Users WHERE Name_User='$pseudo'",PDO::FETCH_ASSOC);
    $say=$stmt->rowcount();
    if($say>0){
      echo $translate[$lang]['exist'];
    }
      else{
        $connexion->query("INSERT INTO Users (First_Name_User, Name_User, Email_User, Id_Accreditation, Id_Company, Id_Department, Password_User) VALUES ('$firstName', '$pseudo', '$email', '$idAccred', '$idCompany', '$idDepartment', '$pass')");
        echo $translate[$lang]['userCreated'];
    }}
  catch (PDOException $error){ 
    echo $error->getMessage();
  }}

  function sanitize($input) {
    // removes leading/trailing spaces
    $input = strip_tags(stripcslashes(htmlentities(trim($input))));
    $input = str_replace("'","",$input);
    // removes html/php tags
    // escapes html special characters &><
    // removes backslash '\'
    return $input;
  }
  ?>

<!-- formulaire injection CSV --> 
<div class="form-example">
    <input type="submit" value="<?php echo $translate[$lang]['submit']?>"name="submit">
  </div>
  </fieldset>
<br>
<div>
  <form method="post" action="upload.php" enctype="multipart/form-data">
    <label for="file"><?php echo $translate[$lang]['SelectCSV']?></label>
    <!-- <input type="hidden" name="MAX_FILE_SIZE" value="30000" /> -->
    <input type="file" id="file" name="fileToUpload" accept=".csv">
    <input type="submit" name='submit'></input>
  </form>
  <button id="CSVConditions">CSV requiered structure</button>
</div>

<div id="myModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <p>Pour importer un csv il faut respecter l'ordre de colonnes suivant:<br>
    First name (str) <br>
    Name(str) <br>
    Email(doit être un email)<br>
    Accréditation (2 pour un employeur, 3 pour un utilisateur)<br>
    IDCompany (2 pour Mosanto / 3 pour company creole)<br>
    IDdepartment (Mosanto: 2 pour marketing, 3 pour la compta. Ccréole : 4 pour RH, 5 pour marketing)<br>
    Mot de passe</p>
  </div>
</div>

<script>
// Get the modal
var modal = document.getElementById("myModal");
// Get the button that opens the modal
var btn = document.getElementById("CSVConditions");
// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];
// When the user clicks on the button, open the modal
btn.onclick = function() {
  modal.style.display = "block";
}
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
} 
</script>


<form method="post">   
    <input type="submit" value="Show users" id="showUsers" name="showUsers">
</form>

<?php
if (isset($_POST['showUsers'])) {
  try
  {
    $Selected_Id_Company = $_SESSION['company'];
    $sqlU = "SELECT * FROM Users WHERE Id_Company='$Selected_Id_Company'";
    $stmt = $connexion->query($sqlU);

    while ($row = $stmt->fetch()) {
      echo $row['First_Name_User']." ".$row['Name_User']." ".$row['Email_User']." ".$row['Id_Accreditation']." ".$row['Id_Department']."<br>";
    }
  }
  catch (PDOException $e)
  {   
      die("Some problems getting data from database" . $e->getMessage());
  }
}
?>

</body>
</html>