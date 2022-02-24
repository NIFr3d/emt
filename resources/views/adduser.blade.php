<?php
use App\Models\utilisateurattente;
$users=utilisateurattente::all();
?>
<html lang="fr">
<head>
  <title>
    EMT 2021-2022
  </title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="css/main.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"/>
  @include("nav")
</head>
<body>
  <div class="corps">
    <br/><br/>
    <TABLE border='1' cellspacing='0'> 
      <TR class='intit'><TH>Prenom</TH><TH>Nom</TH><TH>Identifiant</TH><TH>Adresse mail</TH><TH>Ajouter</TH><TH>Supprimer</TH></TR>
      @foreach($users as $user)
        <TR><TD class='valeurs'>{{$user->prenom}}</TD><TD class='valeurs'>{{$user->nom}}</TD><TD class='valeurs'>{{$user->userid}}</TD><TD class='valeurs'>{{$user->email}}</TD>
        <TD class='valeurs'><form method='post' action='authorizeUser'>@csrf<div id='butTab'><button class='boutonTab' type='submit'>Ajouter</button></div>
        <input type='hidden' name='userid' value='{{$user->userid}}' /></form></TD>
        <TD class='valeurs'><form method='post' action='refuseUser'>@csrf<div id='butTab'><button class='boutonTab' type='submit'>Supprimer</button></div>
        <input type='hidden' name='userid' value='{{$user->userid}}' /></form></TD></TR>
      @endforeach
    </TABLE>
        <?php
				if(isset($_GET["erreur"])) echo($_GET["erreur"]);
				?>
  </div>
</body>
<footer>
    <script src="js/nbuser.js"></script>
</footer>
</html>