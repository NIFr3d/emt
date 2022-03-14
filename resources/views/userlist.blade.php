<?php
use App\Models\utilisateur;
$utilisateurs=utilisateur::all();
?>
<html>
<head>
  <title>
    EMT 2021-2022
  </title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/main.css">
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <div id="navbar"></div>
  @include("nav")
</head>
<body>
  <div class="corps">
  <br /><br /><br /><TABLE BORDER='1' cellspacing='0'> 
  <TR><TH>Prenom</TH><TH>Nom</TH><TH>Identifiant</TH><TH>Adresse mail</TH><TH>Acces</TH><TH>Ajouter administrateur</TH><TH>Rendre utilisateur</TH><TH>Attribuer "Stratégie"</TH><TH>Supprimer</TH></TR>
  @foreach($utilisateurs as $utilisateur)
    <?php
      if($utilisateur->acces==1){ 
        $acces="admin";
      }
      else if(!$utilisateur->acces){
        $acces="utilisateur";
      }
      else if($utilisateur->acces==2){
        $acces="stratégie";
      }
      ?>
      <TR><TD>{{$utilisateur->prenom}}</TD><TD>{{$utilisateur->nom}}</TD><TD>{{$utilisateur->userid}}</TD><TD>{{$utilisateur->email}}</TD><TD>{{$acces}}</TD>
      <TD><form method='post' action='userAdmin'>@csrf<div id='butTab'><button class='boutonTab' type='submit'>Admin</button></div>
      <input type='hidden' name='userid' value='{{$utilisateur->userid}}' /></form></TD>
      <TD><form method='post' action='userNormal'>@csrf<div id='butTab'><button class='boutonTab' type='submit'>Utilisateur</button></div>
      <input type='hidden' name='userid' value='{{$utilisateur->userid}}' /></form></TD>
      <TD><form method='post' action='userStrategy'>@csrf<div id='butTab'><button class='boutonTab' type='submit'>Stratégie</button></div>
      <input type='hidden' name='userid' value='{{$utilisateur->userid}}' /></form></TD>
      <TD><form method='post' action='deleteUser'>@csrf<div id='butTab'><button class='boutonTab' type='submit'>Supprimer</button></div>
      <input type='hidden' name='userid' value='{{$utilisateur->userid}}' /></form></TD>
      </TR>
  @endforeach
  </TABLE>
  <?php
  if(isset($_GET["message"])) echo($_GET["message"]);
  ?>
</div>
</body>
<footer>
    <script src="js/nbuser.js"></script>
</footer>
</html>

			

