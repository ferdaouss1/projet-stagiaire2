<?php
require 'database.php';
$statment = $pdo->prepare('SELECT idStagiaire,nom,prenom,initiale,filiere.id FROM etudient,filiere WHERE etudient.id = filiere.id ');
$statment->execute();
$etudients = $statment->fetchAll(PDO::FETCH_ASSOC);


?>






<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

@charset "UTF-8";
@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

body {
  font-family: 'Open Sans', sans-serif;
  font-weight: 300;
  line-height: 1.42em;
  color:white;
  background-color:white;
}

h1 {
  font-size:3em; 
  font-weight: 300;
  line-height:1em;
  text-align: center;
  color: #4DC3FA;
}

h2 {
  font-size:1em; 
  font-weight: 300;
  text-align: center;
  display: block;
  line-height:1em;
  padding-bottom: 2em;
  color: #FB667A;
}

h2 a {
  font-weight: 700;
  text-transform: uppercase;
  color: #FB667A;
  text-decoration: none;
}

.blue { color: #185875; }
.yellow { color: #FFF842; }

.container th h1 {
	  font-weight: bold;
	  font-size: 1em;
  text-align: left;
  color: white;
}

.container td {
	  font-weight: normal;
	  font-size: 1em;
  -webkit-box-shadow: 0 2px 2px -2px grey;
	   -moz-box-shadow: 0 2px 2px -2px grey;
	        box-shadow: 0 2px 2px -2px grey;
}

.container {
	  text-align: left;
	  overflow: hidden;
	  width: 85%;
	  margin: 0 auto;
  display: table;
  padding: 0 0 8em 0;
}

.container td, .container th {
	  padding-bottom: 2%;
	  padding-top: 2%;
  padding-left:2%;  
}

/* Background-color of the odd rows */
.container tr:nth-child(odd) {
	  background-color: #323C50;
}

/* Background-color of the even rows */
.container tr:nth-child(even) {
	  background-color: #2C3446;
}

.container th {
	  background-color: #1F2739;
}

.container td:first-child { color: #FB667A; }

.container tr:hover {
   background-color: #464A52;
-webkit-box-shadow: 0 6px 6px -6px #0E1119;
	   -moz-box-shadow: 0 6px 6px -6px #0E1119;
	        box-shadow: 0 6px 6px -6px #0E1119;
}

.container td:hover {
  background-color: #FFF842;
  color: #403E10;
  font-weight: bold;
  
  box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
  transform: translate3d(6px, -6px, 0);
  
  transition-delay: 0s;
	  transition-duration: 0.4s;
	  transition-property: all;
  transition-timing-function: line;
}

@media (max-width: 800px) {
.container td:nth-child(4),
.container th:nth-child(4) { display: none; }
}

svg{
    width: 25px;
    margin: 0px 20px;
    cursor: pointer;
}
.th{
    width: 50px;
}
a{
    text-decoration:none;
}
    </style>
</head>
<body>
    <h1>Table Stagiaires</h1>

<form action="" method="GET">
   
<table class="container">
	<thead>
		<tr>
			<th class="th"><h1>ID</h1></th>
			<th><h1>Nom</h1></th>
			<th><h1>Prenom</h1></th>
            <th><h1>Filiere</h1></th>
            <th><h1>Supprimeir Ou Modifier Les Informations</h1></th>
		</tr>
	</thead>
	<tbody>
        <?php foreach ($etudients as $etudient): ?>
            <tr>
                <td><?= $etudient['idStagiaire'] ?></td>
                <td><?= $etudient['nom'] ?></td>
                <td><?= $etudient['prenom'] ?></td>
                <td><?= $etudient['initiale'] ?></td>
                <td class="text-dark bg-light"><span><a href="modifier.php?id=<?php echo $etudient['idStagiaire'];?>" name="modifier"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M362.7 19.3L314.3 67.7 444.3 197.7l48.4-48.4c25-25 25-65.5 0-90.5L453.3 19.3c-25-25-65.5-25-90.5 0zm-71 71L58.6 323.5c-10.4 10.4-18 23.3-22.2 37.4L1 481.2C-1.5 489.7 .8 498.8 7 505s15.3 8.5 23.7 6.1l120.3-35.4c14.1-4.2 27-11.8 37.4-22.2L421.7 220.3 291.7 90.3z"/></svg></a></span><span><a href="supprimer.php?id=<?php  echo $etudient['idStagiaire'];?>" name="supprimer"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><!--!Font Awesome Free 6.5.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></a></span></td>
            </tr>
        <?php endforeach; ?>
	</tbody>
</table>
 
</form>
<script>


  function confirmersuppression(e){
    e.preventdefault();
    if(confirm('etes vous sur de supprimer ce stagiaire')){
      documentg.getElementbyId('supprimerFoem').submit();
    }
  }
</script>

    
    
</body>
</html>
