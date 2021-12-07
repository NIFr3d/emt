var queryString = window.location.search;
var urlParams = new URLSearchParams(queryString);
var msg = urlParams.get('msg');
if(document.cookie==undefined || document.cookie==""){
    location.replace("../pages/login.html")
}
if (msg!=null){
    document.getElementById("msg").innerHTML=msg;
}