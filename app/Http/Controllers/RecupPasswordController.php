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
        $mail=$_POST["email"];
        Mail::to($mail)->send(new ForgotPassword());
        return redirect("/Connexion?erreur=Mail+envoyé");
    }
}
