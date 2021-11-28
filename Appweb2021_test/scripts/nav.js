document.getElementById("logout").onclick = function () { //bouton déconnexion
    sessionStorage.clear();
    window.location.replace("../pages/login.html");
  }
document.getElementById("mainmenu").onclick = function () { //bouton accueil
    window.location.replace("../pages/data.html");
}
document.getElementById("addusermenu").onclick = function () { //bouton ajout d'utilisateur
    window.location.replace("../pages/adduser.html");
}
document.getElementById("removeusermenu").onclick = function () { //bouton suppression d'utilisateur
    window.location.replace("../pages/deluser.html");
}
