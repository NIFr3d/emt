<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\utilisateur;

class AuthController extends Controller
{
    function login(){
        $userid = stripslashes($_POST["login"]);
        $mdp = stripslashes($_POST["mdp"]);
        if(!utilisateur::find($userid)) return redirect("/login?erreur=Utilisateur+inconnu");
        else {
            $utilisateur=utilisateur::find($userid);
            if (password_verify($mdp,$utilisateur->mdp)){
                session(['nom' => $utilisateur->nom]);
                session(['prenom' => $utilisateur->prenom]);
                session(['acces' => $utilisateur->acces]);
                $token=base64_encode(random_bytes(20));
                $utilisateur->token=$token;
                $utilisateur->save();
                cookie("token",$token,300000);
                return redirect("/");
            } else {
                return redirect("/login?erreur=Mot+de+passe+incorrect");
            }
    }
    }
}
