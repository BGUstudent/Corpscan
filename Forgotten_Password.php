<?php include 'translate.php' ?>

<?php
    session_start();

    $connexion = new PDO('mysql:host=mysql-postfutur.alwaysdata.net; dbname=postfutur_corpscan; charset=utf8', 'postfutur', 'Simplon2020',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

    //if already connected, go out
    if (isset($_SESSION['id'])){
        header('Location: index.php');
        exit;
    }

    if(!empty($_POST)){
        extract($_POST);
        $valid = true;

        if (isset($_POST['oublie'])){
            $mail = htmlentities(strtolower(trim($mail))); // On récupère et nettoie le mail afin d envoyer le mail pour la récupèration du mot de passe 
            // Si le mail est vide alors on ne traite pas
            if(empty($mail)){
                $valid = false;
                $er_mail = "Il faut mettre un mail";
            }

            if($valid){
                $verification_mail = $connexion->query("SELECT Name_User, Email_User, New_Pass FROM Users WHERE Email_User = '$mail'");
                $verification_mail = $verification_mail->fetch();

                if(isset($verification_mail['Email_User'])){
                    if($verification_mail['New_Pass'] == 0){
                        // On génère un mot de passe à l'aide de la fonction 
                        $new_pass = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'),1,8);

                        // $new_pass_crypt = crypt($new_pass, "$6$rounds=5000$macleapersonnaliseretagardersecret$");
                        // $new_pass_crypt = crypt($new_pass, "VOTRE CLÉ UNIQUE DE CRYPTAGE DU MOT DE PASSE");

                        $objet = 'Nouveau mot de passe';
                        $to = $verification_mail['Email_User'];
                        $_SESSION['email']=$to;//on stocke dans la variable session afin d'afficher l'email dans la prochaine page.


                        //===== Création du header du mail.
                        $header = "From: Corpscan <adcorpscan@gmail.com> \n";
                        $header .= "Reply-To: ".$to."\n";
                        $header .= "MIME-version: 1.0\n";
                        $header .= "Content-type: text/html; charset=utf-8\n";
                        $header .= "Content-Transfer-Encoding: 8bit";

                        //===== Contenu de votre message
                        $contenu =  "<html>".
                            "<body>".
                            "<p style='text-align: center; font-size: 18px'><b>Bonjour ".$verification_mail['Name_User']."</b>,</p><br/>".
                            "<p style='text-align: justify'><i><b>Votre nouveau mot de passe est : </b></i>".$new_pass."</p><br/>".
                            "</body>".
                            "</html>";
                        //===== Envoi du mail
                        mail($to, $objet, $contenu, $header);
                        // $connexion->insert("UPDATE Users SET Password_User = '$new_pass', New_Pass = 1 WHERE Email_User = '$mail'");
                        $sql = "UPDATE Users SET Password_User = ?, New_Pass = 1 WHERE Email_User = ?";
                        $stmtM= $connexion->prepare($sql);
                        $stmtM->execute([$new_pass, $mail]);
                    }   
                }       
                $suffix = ($lang == 'fr') ? "?lang=fr" : "";
                header('Location: Mail_Sent.php' . $suffix);
                exit;
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <title>Forgotten Password</title>
		<link rel = "stylesheet" type = "text/css" href = "index.css" />
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
	
    <body>
        <div>
			<?php include 'Header2.php' ?>
		</div>	
        <div align="center">
				</br></br>
			<?php
				echo $translate[$lang]["forgotPass"]
			?></br></br>
		</div>
        <div align="center">
			<form method="post">
				<?php
					if (isset($er_mail))	{
												?>
													<div>
														<?= $er_mail
														?>
													</div>
												<?php   
											}
				?>
				<input type="email" placeholder="Adresse mail" name="mail" value="
					<?php
						if(isset($mail))	{
												echo $mail;
											}?>" required>
				<button type="submit" name="oublie">
					<?php
						echo $translate[$lang]["submit"]
					?>
				</button>
			</form>
		</div>
        <div align="center">
		</br></br>
			<a href="index.php
				<?php
					if ($lang=='fr')	{
											echo "?lang=fr";
										}
				?>">
				
				<?php
					echo $translate[$lang]["back"]
				?>
			</a>
		</div>
    </body>
</html>