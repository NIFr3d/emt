<?php
include("configbdd.php");
$host=$config->host;
$user=$config->user;
$pass=$config->pass;
$base=$config->base;
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
function userExist($userid){
    $sql_query = "SELECT COUNT(*) FROM `utilisateur` WHERE `userid`='$userid'";
    $result_set = mysqli_query($this->id,$sql_query);
    $result = mysqli_fetch_row($result_set)[0]; 
    return ($result > 0); //retourne false ou true selon le nombre d'utilisateur correspondant à l'userid donné (0 ou 1)
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
function addUser($userid,$mdp,$nom,$prenom,$acces){
    $sql_query="INSERT INTO `utilisateur` (`nom`, `prenom`, `mdp`, `acces`, `userid`) VALUES ('$nom', '$prenom', '$mdp', '$acces', '$userid');";
    $result_set = mysqli_query($this->id,$sql_query); 
}
function delUser($userid){
    $sql_query="DELETE FROM `utilisateur` WHERE `userid`='$userid'";
    $result_set = mysqli_query($this->id,$sql_query); 
}
}
$db = new DB($config->host,$config->user,$config->pass,$config->base);
$db->connect(); 

?>