<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\utilisateur;
use App\Models\utilisateurattente;

class UsersController extends Controller
{
    function toStrategy(){
        $userid = $_POST["userid"];
        $utilisateur=utilisateur::where("userid",$userid)->first();
        $utilisateur->acces=2;
        $utilisateur->save();
        return redirect("ListeUtilisateurs");
    }
    function toAdmin(){
        $userid = $_POST["userid"];
        $utilisateur=utilisateur::where("userid",$userid)->first();
        $utilisateur->acces=1;
        $utilisateur->save();
        return redirect("ListeUtilisateurs");
    }
    function toNormal(){
        $userid = $_POST["userid"];
        $utilisateur=utilisateur::where("userid",$userid)->first();
        $utilisateur->acces=0;
        $utilisateur->save();
        return redirect("ListeUtilisateurs");
    }
    function delete(){
        $userid = $_POST["userid"];
        $utilisateur=utilisateur::where("userid",$userid)->first();
        $utilisateur->delete();
        return redirect("ListeUtilisateurs");
    }
    function authorizeUser(){
        $userid=$_POST["userid"];
        $ancienutilisateur=utilisateurattente::where("userid",$userid)->first();
        $utilisateur=new utilisateur();
        $utilisateur->nom=$ancienutilisateur->nom;
        $utilisateur->prenom=$ancienutilisateur->prenom;
        $utilisateur->mdp=$ancienutilisateur->mdp;
        $utilisateur->acces=$ancienutilisateur->acces;
        $utilisateur->userid=$ancienutilisateur->userid;
        $utilisateur->email=$ancienutilisateur->email;
        $ancienutilisateur->delete();
        $utilisateur->save();
        return redirect("AjoutUtilisateurs");
    }
    function refuseUser(){
        $userid=$_POST["userid"];
        $utilisateur=utilisateurattente::where("userid",$userid)->first();
        $utilisateur->delete();
        return redirect("AjoutUtilisateurs");
    }
}
