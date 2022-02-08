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
    $sql_query = "SELECT `nom`, `prenom`, `userid`,`acces`,`email` FROM `utilisateur`";
    $result_set = mysqli_query($this->id, $sql_query);
    $result = mysqli_fetch_all($result_set);
    return $result;
}
function getNbUser(){
    $sql_query = "SELECT COUNT(`nom`) FROM `utilisateur`";
    $result_set = mysqli_query($this->id, $sql_query);
    $result = mysqli_fetch_row($result_set)[0];
    return $result;
}
function getRunHistory(){
    $sql_query = "SELECT `dataid` FROM `data` GROUP BY `dataid`";
    $result_set = mysqli_query($this->id, $sql_query);
    $result = mysqli_fetch_all($result_set);
    return $result;
}
function getRunInfos($dataid){
    $sql_query = "SELECT `temps`, `vitesse`, `intensite`,`tension`,`energie`,`lat`,`lon` FROM `data` WHERE `dataid` LIKE '$dataid'";
    $result_set = mysqli_query($this->id,$sql_query); 
    $result = mysqli_fetch_all($result_set); 
    return $result;
}
function adminUser($userid){
    $sql_query="UPDATE `utilisateur` SET `acces`=1 WHERE `userid`='$userid';";
    $result_set = mysqli_query($this->id,$sql_query); 
}
function unadminUser($userid){
    $sql_query="UPDATE `utilisateur` SET `acces`=0 WHERE `userid`='$userid';";
    $result_set = mysqli_query($this->id,$sql_query); 
}
function stratUser($userid){
    $sql_query="UPDATE `utilisateur` SET `acces`=2 WHERE `userid`='$userid'";
    $result_set = mysqli_query($this->id,$sql_query);
}
function isAdmin($userid){
    $sql_query="SELECT `acces` FROM `utilisateur` WHERE `userid`='$userid';";
    $result_set = mysqli_query($this->id,$sql_query); 
    $result = mysqli_fetch_row($result_set)[0]; 
    return ($result == 1);
}
function isStrat($userid){
    $sql_query="SELECT `acces` FROM `utilisateur` WHERE `userid`='$userid';";
    $result_set = mysqli_query($this->id,$sql_query); 
    $result = mysqli_fetch_row($result_set)[0]; 
    return ($result == 2);
}

function getPendingUsers(){
    $sql_query = "SELECT `nom`, `prenom`, `userid`, `email` FROM `utilisateurattente`";
    $result_set = mysqli_query($this->id, $sql_query);
    $result = mysqli_fetch_all($result_set);
    return $result;
}
function userExist($userid){
    $sql_query = "SELECT COUNT(*) FROM `utilisateur` WHERE `userid`='$userid'";
    $sql_query2 = "SELECT COUNT(*) FROM `utilisateurattente` WHERE `userid`='$userid'";
    $result_set = mysqli_query($this->id,$sql_query);
    $result_set2 = mysqli_query($this->id,$sql_query2); 
    $result = mysqli_fetch_row($result_set)[0] + mysqli_fetch_row($result_set2)[0]; 
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
function register($userid,$mdp,$nom,$prenom,$acces,$email=''){
    $sql_query="INSERT INTO `utilisateurattente` (`nom`, `prenom`, `mdp`, `acces`, `userid`,`email`) VALUES ('$nom', '$prenom', '$mdp', '$acces', '$userid','$email');";
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
function delRun($choix){
    $sql_query="DELETE FROM `data` WHERE `dataid`='$choix'";
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
    $sql_query = "SELECT `email` FROM `utilisateurattente` WHERE `userid`='$userid'";
    $result_set = mysqli_query($this->id,$sql_query);
    $email = mysqli_fetch_row($result_set)[0]; 
    $sql_query="INSERT INTO `utilisateur` (`nom`, `prenom`, `mdp`, `acces`, `userid`,`email`) VALUES ('$nom', '$prenom', '$mdp', '$acces', '$userid','$email');";
    $result_set = mysqli_query($this->id,$sql_query); 
    $sql_query="DELETE FROM `utilisateurattente` WHERE `userid`='$userid'";
    $result_set = mysqli_query($this->id,$sql_query); 
}
function temporaryPassword($email){
    $tmdp="";
    $caracs=["a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","$","^","ù","%","*","_","(",")","@"];
    for($i=0;$i<6;$i++){
        $tmdp+=$caracs[rand(0,sizeof($caracs))];
    }
    mail($email,"Votre mot de passe temporaire","Votre mot de passe temporaire pour vous connecter au site de suivi de la voiture de l'EMT est : $tmdp",$headers="noreply@emt.fr");
    $mdp = password_hash($tmdp,PASSWORD_DEFAULT);
    $sql_query = "UPDATE `utilisateur` SET `mdp`='$mdp' WHERE `email`=$email";
    $result_set=mysqli_query($this->id,$sql_query); 
}
}
$db = new DB($host,$user,$pass,$base);
$db->connect(); 

?>