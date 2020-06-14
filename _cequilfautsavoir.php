<?php 

$site_mdp_COOKIE = filter_input(INPUT_COOKIE, 'wrd_srv_site_mdp');
 
 if(isset($site_mdp_COOKIE)){
    header("Location: index.php");
 }     

 ?>       
<!DOCTYPE html>

<html>
    <head>
        <meta charset="ISO-8859-1">
        <link href='./css/style.css' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Exo+2:400,700,500' rel='stylesheet' type='text/css'>
        <title>Ce qu'il faut savoir</title>
    </head>
            <body>
                <div class='label' style="width:50%"> 
        
        
        <h1>Ce qu'il faut savoir avant de se servir de ce site</h1>
        <h3>
            C'est quoi de ce site ???
        </h3>
        
        <p>Ce site permet de g�rer un serveur Wargame Red Dragon. Depuis ce site tu pourras : </p>
        <ul>
            <li>R�gler les principaux param�tre du serveur (Map, nombre de joueurs, income, etc...)</li>
            <li>Afficher la liste de joueurs connect�s sur le serveur, kicker des joueurs, changer les joueurs de camps. Tu ne pourras pas les bannir.</li>
            <li>R�gler des param�tres un peu plus avanc�s comme le temps de d�ploiement, charmement maximum, compte � rebour, etc... Des options sont affich�es mais ne sont pas param�trables, c'est comme dans la 7�me compagnie : Touche pas � �a p'tit con ! :D</li>
            
        </ul>
        <h3>Exigences</h3>
        <ul>
        
            <li>Il te faut imp�rativement les identifiants du serveur : <b>IP, PORT et MOT DE PASSE</b>.</li>
        <li>Ce site est d�velopp� en HTML, PHP et JAVASCRIPT. Pour ce dernier, il faudra imp�rativement que ton navigateur internet accepte de l'ex�cuter</li>
        <li>Tu l'auras compris, il te faut une connexion internet pour pouvoir utiliser ce site</li>
        <li>Les param�tres sont enregistr�s via les cookies de ton navigateur. Il faut donc que tu autorises leur enregistrement.</li>
        </ul>
        
        <p>Ce site est d�velopp� par Alex White, la classe Rcon basique est de <a  class="link" href="http://www.phpclasses.org/package/4897-PHP-Send-RCON-commands-to-a-Source-based-game-server.html" target="_blank">Geert Broekmans</a> et modifi�e par Alex White.</p>
        <p>Ce site est optimis� pour Firefox et partiellement pour Chrome. En aucun cas pour IE ou Edge (d�sol�).</p>
       <form name="formulaire" method="POST" action="./verif.php">
        <p>
            
            <input id="site_mdp" type="text" name="site_mdp" placeholder="Mot de passe du site"/> - <a href="#" class="link" onclick="document.formulaire.submit();">J'ai compris et je ne veux plus voir ce message ! (tu seras malgr� tout renotifi� dans 30 jours :))
                En cliquant sur ce lien, <u><b>je valide le mot de passe</b></u>, je r�gle automatiquement les premiers param�tres et ensuite j'acc�de au site.</a> 
        </p>
         </form>   
<!--                <h3>
                   Pour les super admins 
                </h3>     
                <p>
                    J'entends par super admin, les joueurs qui ont acc�s au serveur ftp qui h�berge ce site. Seuls ces personnes peuvent mettre
                    le site � jour et notamment lorsque des nouvelles maps sont ajout�es au jeu.
                </p>
                
                <p>
                   Pour ajouter les maps suppl�mentaires, deux choses simples sont � faire :
                <h4>1. Modification du fichier maplist.php</h4>
                <ul>
                    <li>Rendez vous dans le dossier ./wrdrcon et trouver le fichier <b>maplist.php</b>.</li>
                    <li>Ouvrez ce fichier avec un �diteur de texte quelconque.</li>
                    <li>Ce fichier contient la liste des maps. Voil� comment comprendre ce fichier :</li>
                    <pre>"2x3_Hwaseong" => ["L'Hiver Nucl�aire arrive",1]</pre>
                    o�
                    <pre>"2x3_Hwaseong" est le nom de la map programmatiquement parlant.</pre>
                    o�
                    <pre>["L'Hiver Nucl�aire arrive",1] est le tableau contenant les infos de la map. En 0, le nom litt�ral, en 1, le nombre de joueurs</pre>
                </ul>
                <h4>2. Ajout de l'image de la map</h4>
                <p>Cette manip n'est pas obligatoire, elle permet juste d'afficher la map sur l'interface</p>
                <p>Pour ajouter une image de map :</p>
                <ul>
                    <li>
                      Rendez vous dans le dossier ./wrdrcon et trouver le dossier <b>maps</b>.  
                    </li>
                    <li>
                       Ajouter l'image de la map dans ce dossier. Le nom de l'image doit �tre strictement 
                       le m�me le nom de la map programmatiquement parlant (voir ci-dessus). Le format de l'image doit
                       imp�rativement �tre au format .jpg (<b>en minuscule</b> imp�ratif)
                    </li>
                        
                </ul>
                <h4>3. Comment h�berger ce site</h4>
                <p>Plusieurs solutions fonctionnent pour pouvoir utiliser ce site</p>
                <ul>
                    <li>Une h�bergement WEB. Il faut que ce dernier autorise le protocole Rcon !</li>
                    <li>Une bonne solution pour ceux qui n'ont pas de serveur d�di� ou d'h�bergement WEB (qui autorise le protocole Rcon) est 
                        d'installer EasyPHP qui �mule un serveur WEB.<br />
                        - T�l�chargement : <a class="link" target='_blank' href='http://www.easyphp.org/'>http://www.easyphp.org/</a>
                        - Placer le dossier wrdrcon dans le dossier <pre>X:\DossierInstallationEasyPHP\data\localweb\</pre>
                        - Ensuite rendez-vous � l'adresse <a class="link" href='http://localhost/wrdrcon'>http://localhost/wrdrcon</a> dans votre navigateur WEB.
                    </li>    
                </ul>-->
   </div> </body>
</html>


