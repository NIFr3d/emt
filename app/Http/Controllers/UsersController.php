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
}
