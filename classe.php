<?php 
    include('conn.php');
    $req = "select * from t_eleve";
    $rs = mysqli_query($conn,$req) or die(mysqli_error());
    $option = NULL;
    while($row = mysqli_fetch_assoc($rs))
        {
          $option .= '<option value = "'.$row['el_id'].'">'.$row['el_prenom'].'</option>';
        }
    $req1 = "select * from t_classe";
    $rs1 = mysqli_query($conn,$req1) or die(mysqli_error());
    $option1 = NULL;
    while($row1 = mysqli_fetch_assoc($rs1))
        {
          $option1 .= '<option value = "'.$row1['cla_id'].'">'.$row1['cla_nom'].'</option>';
        }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Absence</title>
</head>
<body>
    <span>
        <ul style="background-color: MediumSeaGreen; list-style-type: none; overflow: hidden;">
            <li style="float: left; font-size: 17px"><a href='accueil.php'>←</a></li>
            <li style="float: left; font-size: 17px; "><a href='gestion.php'>⌂</a></li>
            <li style="float: left;"><a href='retardlist.php'> ① Retard</a></li>
            <li style="float: left;"><a href='absencelist.php'> ② Absence</a></li>
            <li style="float: left;"><a href='classelist.php'> ③ Classe</a></li>
            <li style="float: left;"><a href='matierelist.php'> ④ Matiere</a></li>
            <li style="float: left;"><a href='sallelist.php'> ⑤ Salle</a></li>
            <li style="float: left;"><a href='examenlist.php'> ⑦ Examen</a></li>
        </ul>
    </span>
</body>
<?php
echo "<div><table>
  <tr>
    <th>Numero</th>
    <th>Classe</th>
  </tr>";

$bdd = new PDO('mysql:host=localhost;dbname=gestioneleve', 'root', '');
$requete="select * from t_classe";
        $resultats=$bdd->query($requete);
        $ligne = $resultats->fetch(PDO::FETCH_OBJ) ;
        while($ligne) {
            echo "<tr><td>".$ligne->cla_id."<td>".$ligne->cla_nom."</td></tr>";
            $ligne = $resultats->fetch(PDO::FETCH_OBJ) ;
                    }
?>
<div>
    <h1><span>Choisir la classe de l'etudiant</span></h1>
    <form method="post" action="traitement4.php">
    <p><label style="color: black">PRENOM DE L'ELEVE :</label>  
    <p>
        <select name="numero"> 
            <option value = "<?php while($row = mysqli_fetch_assoc($rs))
        {
          $option .= '<option value = "'.$row['el_id'].'">'.$row['el_prenom'].'</option>';
        }  ?>"><?php echo $option; ?></option>
        </select>
    </p>
    <p><label style="color: black">NUMERO DE LA CLASSE :</label>   </p>
    <p>
        <select name="classe"> 
            <option value = "<?php while($row1 = mysqli_fetch_assoc($rs1))
        {
          $option1 .= '<option value = "'.$row1['cla_id'].'">'.$row1['cla_nom'].'</option>';
        }  ?>"><?php echo $option1; ?></option>
        </select>
    </p>
    <p><input type="submit" value="CONFIRMER"></p>
    </form>
</div>

<div>
    <h1><span>Créer une classe</span></h1>
    <form method="post" action="createclasse.php">
    <p><label style="color: black">NOM DE LA CLASSE :</label>  
    <p><input type="text" name="nomclasse" required></p>
    <p><input type="submit" value="CREER"></p>
    </form>
</div>
</body>
</html>
<?php
    include("auth.php");
    $bdd = new PDO('mysql:host=localhost;dbname=gestioneleve', 'root', '');

    echo "<h1><div><span>Voici la liste de tous les classes :</span></h1>";
    echo "<p>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspNombre total :&nbsp"
?>
<?php
    include('conn.php');
    $query=mysqli_query($conn,"select count(cla_id) as total from `t_classe`");
    $row=mysqli_fetch_array($query);
?>
<?php 
    echo $row['total'],"</div>"; 
?>