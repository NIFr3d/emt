<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\utilisateur;
use App\Mail\ForgotPassword;

class RecupPasswordController extends Controller
{
    function envoyerMail(){
        $email=$_POST["email"];
        $utilisateur=utilisateur::where("email",$email)->first();
        if(!$utilisateur) return redirect("/Connexion?erreur=Mail+inconnu");
        else {
            Mail::to($email)->send(new ForgotPassword());
            return redirect("/Connexion?erreur=Mail+envoyé");
        }
    }
}
