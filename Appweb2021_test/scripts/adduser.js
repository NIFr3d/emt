var queryString = window.location.search;
var urlParams = new URLSearchParams(queryString);
var msg = urlParams.get('msg');
if (msg!=null){
    document.getElementById("msg").innerHTML=msg;
}