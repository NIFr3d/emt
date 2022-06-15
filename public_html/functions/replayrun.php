<?php
include("BDD.php");
session_start();
if(!isset($_SESSION["acces"])) header("location: ../chooselogin");
$choix=$_GET["choix"];
$listeruns=$db->getRunHistory();
$choixstr=$listeruns[$choix][0];
$runinfos=$db->getRunInfos($choixstr);
?>
[
    <?php for($i=0;$i<count($runinfos);$i++){ ?>
    {
        "temps": "<?php echo($runinfos[$i][0]); ?>",
        "vitesse": "<?php echo($runinfos[$i][1]); ?>",
        "avgspeed": "<?php echo($runinfos[$i][2]); ?>",
        "intensite": "<?php echo($runinfos[$i][3]); ?>",
        "tension": "<?php echo($runinfos[$i][4]); ?>",
        "energie": "<?php echo($runinfos[$i][5]); ?>",
        "lati": "<?php echo($runinfos[$i][6]); ?>",
        "long": "<?php echo($runinfos[$i][7]); ?>",
        "altitude": "<?php echo($runinfos[$i][8]); ?>",
        "tour": "<?php echo($runinfos[$i][9]); ?>",
        "distance": "<?php echo($runinfos[$i][10]); ?>"
    },
    <?php }?>
    {
        "fin": "true"
    }
]