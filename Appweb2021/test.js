const mysql = require('mysql');

const con = mysql.createConnection({
   host: "localhost",
   user: "root",
   password: "root",
   database : "emt2021"
 });

con.connect(function(err) {
   if (err) throw err;
   console.log("Connecté à la base de données MySQL!");
   
 });
 
 function getsql(requete, callback){
 con.query(requete, function (err, result) {
    if (err) throw err;
    return callback(result[0].temps+";"+result[0].vitesse+";"+result[0].consommation);
  });
 }
var donnees;
getsql("SELECT * FROM `data` WHERE `dataid` = 1", function(result){
    donnees=result;
    console.log(donnees);
})


