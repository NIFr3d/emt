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
function adduserul($uid,$acces){
    $sql_query="INSERT INTO `utilisateurul` (`uid`, `acces`) VALUES ('$uid', '$acces');";
    $result_set = mysqli_query($this->id,$sql_query); 
}
function getUserList(){
    $sql_query = "SELECT `nom`, `prenom`, `userid`,`acces`,`email` FROM `utilisateur`";
    $result_set = mysqli_query($this->id, $sql_query);
    $result = mysqli_fetch_all($result_set);
    return $result;
}
function getWSToken(){
    $sql_query = "SELECT `token` FROM `tokenws`";
    $result_set = mysqli_query($this->id, $sql_query);
    $result = mysqli_fetch_row($result_set)[0];
    return $result;
}
function getUserListUL(){
    $sql_query = "SELECT `uid`, `acces` FROM `utilisateurul`";
    $result_set = mysqli_query($this->id, $sql_query);
    $result = mysqli_fetch_all($result_set);
    return $result;
}
function getCircuits(){
    $sql_query = "SELECT `nom` FROM `circuits`";
    $result_set = mysqli_query($this->id, $sql_query);
    $result = mysqli_fetch_all($result_set);
    return $result;
}
function changeCircuit($nom){
    $sql_query = "SELECT `nom` FROM `circuits` WHERE `nom` LIKE '$nom'";
    $result_set = mysqli_query($this->id,$sql_query);
    if($result_set->num_rows != 0){
        $sql_query="UPDATE `circuits` SET `actif`=0";
        $result_set = mysqli_query($this->id,$sql_query); 
        $sql_query="UPDATE `circuits` SET `actif`=1 WHERE `nom` LIKE '$nom'";
        $result_set = mysqli_query($this->id,$sql_query); 
    }
    $result = mysqli_fetch_row($result_set)[0];
    return $result;
}
function getCurrentCircuit(){
    $sql_query = "SELECT `lat`, `lon`, `nom` FROM `circuits` WHERE `actif`=1";
    $result_set = mysqli_query($this->id, $sql_query);
    $result = mysqli_fetch_all($result_set)[0];
    return $result;
}
function getNbUser(){
    $sql_query = "SELECT COUNT(`nom`) FROM `utilisateur`";
    $result_set = mysqli_query($this->id, $sql_query);
    $result = mysqli_fetch_row($result_set)[0];
    $sql_query = "SELECT COUNT(`uid`) FROM `utilisateurul`";
    $result_set = mysqli_query($this->id, $sql_query);
    $result+=mysqli_fetch_row($result_set)[0];
    return $result;
}
function getRunHistory(){
    $sql_query = "SELECT `dataid` FROM `data` GROUP BY `dataid`";
    $result_set = mysqli_query($this->id, $sql_query);
    $result = mysqli_fetch_all($result_set);
    return $result;
}
function getRunInfos($dataid){
    $sql_query = "SELECT `temps`, `vitesse`,`avgspeed`,`intensite`,`tension`,`energie`,`lat`,`lon`,`alt`,`lap` FROM `data` WHERE `dataid` LIKE '$dataid'";
    $result_set = mysqli_query($this->id,$sql_query); 
    $result = mysqli_fetch_all($result_set); 
    return $result;
}
function adminUser($userid){
    $sql_query="UPDATE `utilisateur` SET `acces`=1 WHERE `userid`='$userid';";
    $result_set = mysqli_query($this->id,$sql_query); 
}
function adminUserul($userid){
    $sql_query="UPDATE `utilisateurul` SET `acces`=1 WHERE `uid`='$userid';";
    $result_set = mysqli_query($this->id,$sql_query); 
}
function unadminUser($userid){
    $sql_query="UPDATE `utilisateur` SET `acces`=0 WHERE `userid`='$userid';";
    $result_set = mysqli_query($this->id,$sql_query); 
}
function unadminUserul($userid){
    $sql_query="UPDATE `utilisateurul` SET `acces`=0 WHERE `uid`='$userid';";
    $result_set = mysqli_query($this->id,$sql_query); 
}
function stratUser($userid){
    $sql_query="UPDATE `utilisateur` SET `acces`=2 WHERE `userid`='$userid'";
    $result_set = mysqli_query($this->id,$sql_query);
}
function stratUserul($userid){
    $sql_query="UPDATE `utilisateurul` SET `acces`=2 WHERE `uid`='$userid'";
    $result_set = mysqli_query($this->id,$sql_query);
}
function isAdmin($userid){
    $sql_query="SELECT `acces` FROM `utilisateur` WHERE `userid`='$userid';";
    $result_set = mysqli_query($this->id,$sql_query); 
    $result = mysqli_fetch_row($result_set)[0]; 
    return ($result == 1);
}
function isAdminul($userid){
    $sql_query="SELECT `acces` FROM `utilisateurul` WHERE `uid`='$userid';";
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
function isStratul($userid){
    $sql_query="SELECT `acces` FROM `utilisateurul` WHERE `uid`='$userid';";
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
function userExistul($userid){
    $sql_query = "SELECT COUNT(*) FROM `utilisateurul` WHERE `uid`='$userid'";
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
function register($userid,$mdp,$nom,$prenom,$acces,$email=''){
    $sql_query="INSERT INTO `utilisateurattente` (`nom`, `prenom`, `mdp`, `acces`, `userid`,`email`) VALUES ('$nom', '$prenom', '$mdp', '$acces', '$userid','$email');";
    $result_set = mysqli_query($this->id,$sql_query); 
}
function delUser($userid){
    $sql_query="DELETE FROM `utilisateur` WHERE `userid`='$userid'";
    $result_set = mysqli_query($this->id,$sql_query); 
}
function delUserul($userid){
    $sql_query="DELETE FROM `utilisateurul` WHERE `uid`='$userid'";
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
    $caracs=["0","1","2","3","4","5","6","7","8","9"];
    for($i=0;$i<6;$i++){
        $j=rand(0,count($caracs)-1);
        $tmdp.=$caracs[$j];
    }
    $mdp = password_hash($tmdp,PASSWORD_DEFAULT);
    $sql_query = "UPDATE `utilisateur` SET `mdp`='$mdp' WHERE `email`='$email'";
    $result_set=mysqli_query($this->id,$sql_query); 
    return $tmdp;
}
function emailExists($email){
    $sql_query = "SELECT COUNT(*) FROM `utilisateur` WHERE `email`='$email'";
    $result_set = mysqli_query($this->id,$sql_query);
    $result = mysqli_fetch_row($result_set)[0]; 
    return ($result > 0);
}
function changemdp($mdp,$userid){
    $sql_query="UPDATE `utilisateur` SET `mdp` ='$mdp' WHERE `userid`='$userid';";
    $result_set = mysqli_query($this->id,$sql_query); 
}
function isEmt($uid){
    $sql_query = "SELECT COUNT(*) FROM `utilisateurul` WHERE `uid`='$uid'";
    $result_set = mysqli_query($this->id,$sql_query);
    $result = mysqli_fetch_row($result_set)[0]; 
    return ($result > 0);
}
function accesforUL($uid){
    $sql_query = "SELECT `acces` FROM `utilisateurul` WHERE `uid`='$uid'";
    $result_set = mysqli_query($this->id,$sql_query); 
    $result = mysqli_fetch_row($result_set)[0]; 
    return $result;
}
}
$db = new DB($host,$user,$pass,$base);
$db->connect(); 

?>