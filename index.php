<!DOCTYPE html>

<?php include 'translate.php' ?>

<html lang="fr">
	<head>
		<title>Login</title>
		<link rel = "stylesheet" type = "text/css" href = "index.css" />
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta http-equiv="X-UA-Compatible" content="ie=edge">
	</head>

	<body>
		<div>
			<?php include 'Header2.php' ?>
		</div>
<!-- END Insert logo and languages flags -->

<!-- BEGIN FORM -->
		<div class="form_example">
		</br></br>
			<form method="post" class="form-example" action="index.php<?php if ($lang=='fr'){echo "?lang=fr";}?>">
				<fieldset>
					<legend style="font-weight:bold"><?php echo $translate[$lang]['login']?></legend>
<!-- Username -->
							<div class="form-example">
								<label for="username"><?php echo $translate[$lang]['name']?></label>
								<input placeholder="<?php echo $translate[$lang]['nameInput']?>"type="text" name="pseudo" id="pseudo" required>
							</div>
<!-- Password -->
							<div class="form-example">
								<label for="password"><?php echo $translate[$lang]['password']?></label>
								<input placeholder="<?php echo $translate[$lang]['passwordInput']?>"type="password" name="pass" id="pass" required>
							</div>
<!-- Submit -->
								<div class="form-example">
									<input type="submit" value="<?php echo $translate[$lang]['submit']?>"name="submit">
								</div>
				</fieldset>
			</form>
		</div>
		<div class="form_example" align="center">
			</br></br>
			<a href="Forgotten_Password.php<?php if ($lang=='fr'){echo "?lang=fr";}?>"><?php echo $translate[$lang]["forgotPass"]?></a>
		</div>
<!-- END FORM -->

	<?php
		session_start();// on démarre une session

		if (isset($_POST['submit'])) {	// on vérifie que les inputs soient remplis
			$pseudo = $_POST['pseudo']; //on récup l'input pseudo et on l'affecte
			$pseudo = sanitize($pseudo); //on nettoie pour éviter les erreurs et les injections (fonction en bas)
			$pass = $_POST['pass']; //on récup l'input password et on l'affecte
			$pass = sanitize($pass); //on nettoie pour éviter les erreurs et les injections (fonction en bas)
			// $pass = md5($_POST['pass']); // on crypte
			try{
				// On se connecte à la BDD
				$connexion = new PDO('mysql:host=mysql-postfutur.alwaysdata.net; dbname=postfutur_corpscan; charset=utf8', 'postfutur', 'Simplon2020');
				// Requete qui selectionne les user et password CORRESPONDANT aux inputs
				$stmtL = $connexion->query("SELECT * FROM Users WHERE Name_User='$pseudo' && Password_User='$pass'",PDO::FETCH_ASSOC);//je vois pas la diff avec ou sans FETCH_ASSOC
				// On compte le nombre de ligne qui correspondent dans la BDD (normalement 1 seul)
				$sayL = $stmtL->rowCount();
				if( $sayL > 0 ){
					// $_SESSION['session']=true;
					$_SESSION['nameL']=$pseudo;
					$_SESSION['passL']=$pass;
					// requete valeur Id_accreditation
					$stmtT=$connexion->query("SELECT Id_Accreditation FROM Users WHERE Name_User='$pseudo'");
					// qu'on stocke
					$accred=$stmtT->fetchColumn();
					//fonction pour selectionner toutes les infos de l'utilisateur
					$req = $connexion->query("SELECT * FROM Users WHERE Name_User='$pseudo'");
					$req = $req->fetch();
					$_SESSION['accred']=$accred;
					// renvoi à différents menus selon accred
					if($req['New_Pass'] == 1){ // On remet à zéro la demande de nouveau mot de passe s'il y a bien un couple mail / mot de passe
						$mdpR= ("UPDATE Users SET New_Pass = 0 WHERE Name_User='$pseudo'");
						$stmtR=$connexion->prepare($mdpR);
						$stmtR->execute();
					}
					if ($accred == 1){
						if ($lang=='fr'){
							header('location:Company_Select.php?lang=fr.php');
						}else{	
							header('location:Company_Select.php');
						}
					}elseif ($accred == 2){
						if ($lang=='fr'){
							header('location:Menu_Employer.php?lang=fr.php');
						}else{
							header('location:Menu_Employer.php');
						}
					}elseif ($accred == 3){
						if ($lang=='fr'){
							header('location:Menu_User.php?lang=fr.php');
						}else{
							header('location:Menu_User.php');
						}
					}        
				}else{
					echo $translate[$lang]['error'];
				}
			}
			catch (PDOException $error){
				echo $error->getMessage();
			}
		}

/* BEGIN Function sanitize */
				function sanitize($input){
					$input = strip_tags(stripcslashes(htmlentities(trim($input))));
					$input = str_replace("'","",$input);
					return $input;
				}
/* END Function sanitize */
		?>
	</body>
</html>