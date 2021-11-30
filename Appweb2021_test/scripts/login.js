var queryString = window.location.search;
var urlParams = new URLSearchParams(queryString);
var erreur = urlParams.get('erreur');
if (erreur!=null){
    document.getElementById("error").innerHTML=erreur;
}