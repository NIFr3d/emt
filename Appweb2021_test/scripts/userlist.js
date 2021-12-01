var queryString = window.location.search;
var urlParams = new URLSearchParams(queryString);
var message = urlParams.get('message');
if (message!=null){
    switch (message){
        case "succes":
            document.getElementById("error").innerHTML="Utilisateur supprimé avec succès"
            break;
        case "echec":
            document.getElementById("error").innerHTML="Un problème est survenu, utilisateur non supprimé"
            break;
    }
}