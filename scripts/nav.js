document.getElementById("logout").onclick = function () { //bouton déconnexion
    document.cookie="userid=; expires=-1;path=/;";
    document.cookie="nom=; expires=-1;path=/;";
    document.cookie="prenom =; expires=-1;path=/;";
    document.cookie="acces =; expires=-1;path=/;";
    document.cookie="islogged =; expires=-1;path=/;";
    window.location.replace("../pages/login.html");
  }
document.getElementById("mainmenu").onclick = function () { //bouton accueil
    window.location.replace("../pages/data.html");
}
document.getElementById("addusermenu").onclick = function () { //bouton ajout d'utilisateur
    window.location.replace("../pages/adduser.html");
}
document.getElementById("removeusermenu").onclick = function () { //bouton suppression d'utilisateur
    window.location.replace("../php/userlist.php");
}