<?php
include("configbdd.php");

class DB{

// parametres de connexion à la base de données
public $host;
public $user;
public $pass;
public $base;
function __construct($host,$user,$pass,$base){
    $this->host=$host;
    $this->user=$user;
    $this->pass=$pass;
    $this->base=$base;
}

private $id;

public function connect(){
    $this->id = mysqli_connect($this->host, $this->user, $this->pass, $this->base); // connexion
}
function getUserList(){
    $sql_query = "SELECT `nom`, `prenom`, `userid` FROM `utilisateur`";
    $result_set = mysqli_query($this->id, $sql_query);
    $result = mysqli_fetch_all($result_set);
    return $result;
}
function getRunHistory(){
    $sql_query = "SELECT `dataid` FROM `data` GROUP BY `dataid`";
    $result_set = mysqli_query($this->id, $sql_query);
    $result = mysqli_fetch_all($result_set);
    return $result;
}
function getRunInfos($dataid){
    $sql_query = "SELECT `temps`, `vitesse`, `consommation`,`lat`,`lon` FROM `data` WHERE `dataid` LIKE '$dataid'";
    $result_set = mysqli_query($this->id,$sql_query); 
    $result = mysqli_fetch_all($result_set); 
    return $result;
}
function getPendingUsers(){
    $sql_query = "SELECT `nom`, `prenom`, `userid` FROM `utilisateurattente`";
    $result_set = mysqli_query($this->id, $sql_query);
    $result = mysqli_fetch_all($result_set);
    return $result;
}
function userExist($userid){
    $sql_query = "SELECT COUNT(*) FROM `utilisateur` WHERE `userid`='$userid'";
    $result_set = mysqli_query($this->id,$sql_query);
    $result = mysqli_fetch_row($result_set)[0]; 
    return ($result > 0); //retourne false ou true selon le nombre d'utilisateur correspondant à l'userid donné (0 ou 1)
}
function tokenExist($token){
    $sql_query = "SELECT COUNT(*) FROM `utilisateur` WHERE `token`='$token'";
    $result_set = mysqli_query($this->id,$sql_query);
    $result = mysqli_fetch_row($result_set)[0]; 
    return ($result > 0); //retourne false ou true selon le nombre d'utilisateur correspondant au token donné (0 ou 1)
}
function getMdp($userid){
    $sql_query = "SELECT `mdp` FROM `utilisateur` WHERE `userid`='$userid'";
    $result_set = mysqli_query($this->id,$sql_query); 
    $result = mysqli_fetch_row($result_set)[0]; 
    return $result;
}
function getInfos($userid){
    $sql_query = "SELECT `nom`, `prenom`, `acces` FROM `utilisateur` WHERE `userid`='$userid'";
    $result_set = mysqli_query($this->id,$sql_query); 
    $result = mysqli_fetch_row($result_set); 
    return $result;
}
function gettokenInfos($token){
    $sql_query = "SELECT `nom`, `prenom`, `acces` FROM `utilisateur` WHERE `token`='$token'";
    $result_set = mysqli_query($this->id,$sql_query); 
    $result = mysqli_fetch_row($result_set); 
    return $result;
}
function register($userid,$mdp,$nom,$prenom,$acces){
    $sql_query="INSERT INTO `utilisateurattente` (`nom`, `prenom`, `mdp`, `acces`, `userid`) VALUES ('$nom', '$prenom', '$mdp', '$acces', '$userid');";
    $result_set = mysqli_query($this->id,$sql_query); 
}
function saveToken($userid,$token){
    $sql_query="UPDATE `utilisateur` SET `token` ='$token' WHERE `userid`='$userid';";
    $result_set = mysqli_query($this->id,$sql_query); 
}
function delUser($userid){
    $sql_query="DELETE FROM `utilisateur` WHERE `userid`='$userid'";
    $result_set = mysqli_query($this->id,$sql_query); 
}
function refuseUser($userid){
    $sql_query="DELETE FROM `utilisateurattente` WHERE `userid`='$userid'";
    $result_set = mysqli_query($this->id,$sql_query); 
}
function authorizeUser($userid){
    $sql_query = "SELECT `nom` FROM `utilisateurattente` WHERE `userid`='$userid'";
    $result_set = mysqli_query($this->id,$sql_query); 
    $nom = mysqli_fetch_row($result_set)[0];
    $sql_query = "SELECT `mdp` FROM `utilisateurattente` WHERE `userid`='$userid'";
    $result_set = mysqli_query($this->id,$sql_query); 
    $mdp = mysqli_fetch_row($result_set)[0]; 
    $sql_query = "SELECT `prenom` FROM `utilisateurattente` WHERE `userid`='$userid'";
    $result_set = mysqli_query($this->id,$sql_query); 
    $prenom = mysqli_fetch_row($result_set)[0];
    $sql_query = "SELECT `acces` FROM `utilisateurattente` WHERE `userid`='$userid'";
    $result_set = mysqli_query($this->id,$sql_query); 
    $acces = mysqli_fetch_row($result_set)[0];  
    $sql_query="INSERT INTO `utilisateur` (`nom`, `prenom`, `mdp`, `acces`, `userid`) VALUES ('$nom', '$prenom', '$mdp', '$acces', '$userid');";
    $result_set = mysqli_query($this->id,$sql_query); 
    $sql_query="DELETE FROM `utilisateurattente` WHERE `userid`='$userid'";
    $result_set = mysqli_query($this->id,$sql_query); 
}
}
$db = new DB($host,$user,$pass,$base);
$db->connect(); 

?>