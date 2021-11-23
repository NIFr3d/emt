var canevas = document.getElementById("canevas");
contexte = canevas.getContext("2d");
var flipflop = true;
const download = document.getElementById('download');

canevas.addEventListener('mousedown',function(e) {
  console.dir(canevas);
  var rect = e.target.getBoundingClientRect();
  var x = e.clientX - rect.left; //x position within the element.
  var y = e.clientY - rect.top;  //y position within the element
  canevas.oncontextmenu = function(e) { e.preventDefault(); e.stopPropagation(); }
  switch(e.button){
    case 2:                //clic droit
      flipflop=true;
      break;

    case 0:                //clic gauche
      if (flipflop){
        contexte.beginPath();
        contexte.moveTo(x,y);
        flipflop=false;
      }
      else{
        contexte.lineTo(x,y);
        contexte.stroke();
      }
      break;

    default:
      console.log('Pas un clic');
  }

  });
  download.addEventListener('click', function(e) {
    console.dir(canevas.toDataURL());
    const link = document.createElement('a');
    link.download = 'carteDessin.png';
    link.href = canevas.toDataURL();
    link.click();
    link.delete;

   // var base64Data = req.rawBody.replace(/^data:image\/png;base64,/, "");
   // require("fs").writeFile("Cartes/out.png", base64Data, 'base64', function(err) {
   //   console.log(err);
   // });
   //(côté serveur, renvoyer le console.dir(canevas.toDataURL()))
  });