<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\utilisateur;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    function login(){
        $userid = stripslashes($_POST["login"]);
        $mdp = stripslashes($_POST["mdp"]);
        if(!utilisateur::find($userid)) return redirect("/Connexion?erreur=Utilisateur+inconnu");
        else {
            $utilisateur=utilisateur::find($userid);
            if (password_verify($mdp,$utilisateur->mdp)){
                session(['nom' => $utilisateur->nom]);
                session(['prenom' => $utilisateur->prenom]);
                session(['acces' => $utilisateur->acces]);
                $token=base64_encode(random_bytes(20));
                $utilisateur->token=$token;
                $utilisateur->save();
                Cookie::queue(Cookie::make("token",$token,300000));
                return redirect("/");
            } else {
                return redirect("/Connexion?erreur=Mot+de+passe+incorrect");
            }
        }
    }
    function logout(){
        Cookie::queue(Cookie::forget("token"));
        session()->flush();
        return redirect("/Connexion?erreur=Vous+avez+été+déconnecté");
    }
    function cookieAuth(){
        if(Cookie::get("token")==null) return redirect("Connexion?erreur=Veuillez+vous+connecter");
        else{
            $utilisateur=utilisateur::where("token",Cookie::get("token"))->first();
            session(['nom' => $utilisateur->nom]);
            session(['prenom' => $utilisateur->prenom]);
            session(['acces' => $utilisateur->acces]);
            return redirect("/");
        }
    }
}
