<?php
session_start();
include('conn.php');
try
{
 $bdd = new PDO('mysql:host=localhost;dbname=gestion_etudiant', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
$req= $bdd->prepare('INSERT INTO eleve(el_nom, el_prenom, el_ddn, el_adressemail, el_diplome, el_opt) VALUES(:nom, :prenom, :dates, :email, :diplome, :options)');
$req->execute (array(
    'nom' => htmlspecialchars($_POST['nom']),
    'prenom' => htmlspecialchars($_POST['prenom']),
    'dates' => htmlspecialchars($_POST['dates']),
    'email' => htmlspecialchars($_POST['email']),
    'diplome' => htmlspecialchars($_POST['diplome']),
    'options' => htmlspecialchars($_POST['options']),
));
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Accueil</title>
</head>
<body>
    <ul>
        <li><a href='accueil.php'> Accueil</a></li>
        <li><a href='register2.php'> S'inscrire</a></li>
        <li><a href='filtre.php'> Filtrage des élèves </a></li>
        <li><a href='info.php'> Information sur un élèves </a></li>
        <li><a href='listefinal.php'> Listes des élèves </a></li>
    </ul>
    <div>
        <h1><span>Remplir les informations sur vous</span></h1>
        <form method="post" action="traitement.php">
        <p><label>NOM</label> : 
        <p><input type="text" name="nom" required></p>
        <p> <label>PRENOM</label> : 
        <p><input type="text" name="prenom" required></p>
        <p><label>DATE DE NAISSANCE</label> : 
        <p><input type="date" name='dates' required></p>
        <p><label>ADDRESSE EMAIL</label> :  
        <p><input type="email" name="email" required></p>
        <p><label>DIPLOME </label> : </p>
        <select name="diplome" required>
            <option value="A2">Serie A2</option>
            <option value="D">D</option>
        <option value="C">C</option>   
        </select></p>
        <p><label>FILIAIRE</label> : </p>
        <select name="options" required>
            <option value="DEV">intégration et développement</option>
            <option value="RSI">réseaux et systèmes </option>
        </select>
        </p>
        <p><input type="submit" value="envoyer mes informations"></p>
    </div>
</form>
</body>
</html>