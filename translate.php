<?php

$lang = 'en';
if (isset($_GET['lang'])){
    $lang = 'fr';
}

$translate = array(
  "fr" => array(
    "login" => "Se connecter",
    "name"=>"Utilisateur",
    "nameInput"=>"ex : JMlebBGdu61",
    "password"=>"Mot de passe",
    "passwordInput"=>"12345 tmtc",
    "submit"=>"Valider",
    "error"=>"Nom d'utilisateur ou mot de passe erroné",
    "logout"=>"Se déconnecter",
    "disconnected"=>"Vous avez été déconnecté",
    "back"=>"Retour",
    "stat"=>"Statistiques",
    "filter"=>"Filtre",
    "SI1"=>"sous item 1",
    "company"=>"Entrepises",
    "user"=>"Utilisateur",
    "legal notice"=>"Mentions Légales",
    "rights"=>"Droits",
    "themes"=>"Thèmes",
    "forgotPass"=>"Mot de passe oublié ?",
    "mailSent"=>"Un email vous a été envoyé à ",
    "redirect"=>"Redirection dans 5 secondes vers la page de connection",
    "signup"=>"Enregistrer un nouvel utilisateur",
    "firstName"=>"Prénom",
    "Name"=>"Nom",
    "Accreditation"=>"Accréditation",
    "select"=>"Veuillez sélectionner une entreprise",
    "userCreated"=>"Un nouvel utilisateur a été ajouté à la base de données",
    "Admin_Menu"=>"Menu Administrateur",
    "User_Menu"=>"Menu Utilisateur",
    "Employer_Menu"=>"Menu Employeur",
    "Home"=>"Accueil",
    "department"=>"departement",
    "SelectCSV"=>"Sélectionner le fichier CSV à envoyer",
	
    ),

  "en" => array(
    "login" => "Login",
    "name"=>"Username",
    "nameInput"=>"ex : JMlebBGdu61",
    "password"=>"Password",
    "passwordInput"=>"whatever",
    "submit"=>"Submit",
    "error"=>"Incorrect username or password",
    "logout"=>"Logout",
    "disconnected"=>"You've been succesfully disconnected",
    "back"=>"Go back",
    "stat"=>"Statistics",
    "filter"=>"Filter",
     "SI1"=>"sub item 1",
     "company"=>"Company",
     "user"=>"User",
     "legal notice"=>"Legal Notice",
     "rights"=>"Rights",
     "themes"=>"Themes",
     "forgotPass"=>"You forgot your password?",
     "mailSent"=>"An email has been sent to ",
     "redirect"=>"You'll be redirected in 5 seconds",
     "signup"=>"Sign up",
     "firstName"=>"First Name",
     "Name"=>"Nom",
     "Accreditation"=>"Accreditation",
     "select"=>"Please select a company",
     "userCreated"=>"A new user has been added to the database",
     "Admin_Menu"=>"Admin Menu",
     "User_Menu"=>"User Menu",
     "Employer_Menu"=>"Employer Menu",
     "Home"=>"Home",
     "department"=>"department",
     "SelectCSV"=>"Select a CSV to upload",
 
  ),
);

?>