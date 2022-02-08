<?php
include("BDD.php");
require('../../vendor/autoload.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$email=trim($_POST["email"]);
if(!$db->emailExists($email) || $_POST["email"] == ""){
    header("location: ../forgottenpassword?erreur=Aucun+utilisateur+ne+correspond+à+cette+adresse+mail");
}
else{
    $tmdp=$db->temporaryPassword($email);
    try{
        $mail = new PHPMailer(true);
        $mail->IsSMTP();
        $mail->Host = 'smtp.googlemail.com';               //Adresse IP ou DNS du serveur SMTP
        $mail->Port = 465;                          //Port TCP du serveur SMTP
        $mail->SMTPAuth = true;                        //Utiliser l'identification

        if($mail->SMTPAuth){
        $mail->SMTPSecure = 'ssl';               //Protocole de sécurisation des échanges avec le SMTP
        $mail->Username   =  'noreply.emt.polytechnancy@gmail.com';   //Adresse email à utiliser
        $mail->Password   =  'gpsrglqabndomwnu';         //Mot de passe de l'adresse email à utiliser
        }
        
        $mail->CharSet = 'UTF-8'; //Format d'encodage à utiliser pour les caractères
        $mail->setFrom('noreply.emt.polytechnancy@gmail.com', 'EMT');

        $mail->Subject    =  'Votre mot de passe temporaire';                      //Le sujet du mail
        $mail->MsgHtml("Votre mot de passe temporaire pour vous connecter au site de suivi de la voiture de l'EMT est : $tmdp");

        $mail->AddAddress($email);

        $mail->send();
        header("location: ../login?erreur=Un+email+vous+a+été+envoyé");
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>