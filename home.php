<!DOCTYPE html>
<?php
ini_set('display_errors', 1);
require './ini.php';

$reglage = new reglage();
$langage = $reglage->langage;

// Système de traduction
if(file_exists("./langage/$langage.php")){
    require "./langage/$langage.php";
    $expression = new expressions();
}else{
    require "./langage/defaut_lang.php";
    $expression = new expressions();
    
}
?>
<html>
    <head>
        <meta charset="ISO-8859-1">
        <link href='./css/style.css' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Exo+2:400,700,500' rel='stylesheet' type='text/css'>
        <title>AW's WRD Rcon - Accueil</title>
    </head>
    <body>
        <div class="encart">
            <h2>
                <?php echo $expression->home_titre; ?></h2>
            <p>
                <?php echo $expression->home_description; ?>
            </p>
            <form name="formulaire" method="POST" action="./verif.php">
            <table style='width: 100%;text-align: center; margin: 30px 0px 30px 0px'>
                <tr>
                    <td><span style="color:#29573A">Mot de passe</span></td>
                    <td><input id="site_mdp" type="text" name="site_mdp" placeholder="<?php echo $expression->home_placehoder ?>"/></td>
                    <td><a href="#" class="link" onclick="document.formulaire.submit();"><?php echo $expression->home_VALIDATION ?></a></td>
                </tr>
            </table>
                </form>
            <p>
             <?php echo $expression->home_liens_utiles ?> : 
             <a class="link" target="_blank" href="http://games.alex-box.net/aws-wrd-rcon-gerer-un-serveur-wargame/"><?php echo $expression->home_aide ?></a> - 
             <a class="link" target="_blank" href="http://games.alex-box.net/aws-wrd-rcon-gerer-un-serveur-wargame/aws-wrd-rcon-telechargement/"><?php echo $expression->home_telechargement ?></a> - 
             <a class="link" target="_blank" href="https://www.youtube.com/user/alexwhitefr">Youtube</a>
            </p>
        </div>
    </body>
</html>
