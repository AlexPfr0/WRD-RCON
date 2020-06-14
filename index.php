<?php
require './ini.php';
ini_set('display_errors', 1);
$reglage = new reglage();
$langage = $reglage->langage;
$APIversion = $reglage->APIversion;

$super_reglage = $reglage->autoriser_super_reglage;
if($super_reglage == false){
    $disabled = 'disabled="disabled"';
}else{
   $disabled = '';  
}

$message = '';
// Système de traduction
if(file_exists("./langage/$langage.php")){
    require "./langage/$langage.php";
    $expression = new expressions();
    
}else{
    require "./langage/defaut_lang.php";
    $expression = new expressions();
    $message = "<span class=\"message\">Le langage sp�cifi� n'a pas �t� trouv� !<br />
                The requested language has not be found!</span><hr />";
    
}


// Site l'utilisateur n'est pas identifié, retour � l'accueil
// S�curit� mise en place pour la publication de cette API

$site_mdp_COOKIE = filter_input(INPUT_COOKIE, 'wrd_srv_site_mdp');
if(!isset($site_mdp_COOKIE)){
         header("Location: home.php");
}  

?>

<!DOCTYPE html>


<?php
include "fonctions.php";
?>
<html>
    <head>
        <meta charset="ISO-8859-1">
        <title><?php echo $expression->TITRE ?></title>
        
        <link href='./css/style.css' rel='stylesheet' type='text/css'>
        
        <link href='https://fonts.googleapis.com/css?family=Exo+2:400,700,500' rel='stylesheet' type='text/css'>
        <link rel="icon" href="./css/icones/favicon.ico" />

        <script type="text/javascript" src="./js/css.js"></script>
        
        <script src="https://use.fontawesome.com/fbede96a60.js"></script>
        
        <script type="text/javascript" src="./js/CommandeServeur.js"></script>
        <script type="text/javascript" src="./js/ActionCookie.js"></script>
        <script type="text/javascript" src="./js/ModifierInterface.js"></script>
        
<!--        Cr�e un instance de la classe CommandeServeur-->
        <script>var commandeServeur = new CommandeServeur();</script>
        <script>var actionCookie = new ActionCookie();</script>
        <script>var modifierInterface = new ModifierInterface();</script>
    </head>
    <body>
        <script>
        
        </script>
        <div class="global">
            <div  id="nom_lobby" class="NomLobby"> 
                
                <?php echo $_COOKIE['wrd_srv_nom_lobby'] ?>
            
            </div> 

            <table class="t_global">
                 <tbody>
                    <tr>
                        <td class="entete" colspan="2">
                            <img id="connexion" src="css/icones/disconnected.png" />
                            <i class="fa fa-link" aria-hidden="true"></i> 
 <?php echo $expression->CONNEXION_SERVEUR ?>
                            <img class="save" src="./css/icones/save.png" style="" 
                                 onclick="
                                     actionCookie.savePreset(document.getElementById('preset').value);   
                                    " /> 
                                <select title="Preset" id="preset" style=""
                                        onchange="
                                        actionCookie.chargePreset(this.value);
                                        commandeServeur.listeJoueurs()">
                                            <option value="1" class="preset">1</option>
                                            <option value="2" class="preset">2</option>
                                            <option value="3" class="preset">3</option>
                                        </select>
                                            
                                    </td>
                        
                        
                        
                        <td  class="place_image"rowspan="11">
                            
                            <?php echo $message ?>
                            <img title="Partie prot�g�e par mot de passe" class="verrou" id="verrou" src="./css/icones/verrou.png"/>
                            <img title="Contrainte nation" class="contr_nat" id="nation" src=""/>
                            <img title="Th�matique" class="contr_thm" id="theme" src=""/>
                            <img title="Contrainte �poque" class="contr_ere" id="epoque" src=""/><br />
                            <img class="imgmap" id="imgmap" src=""/><br />
                            <span style="font-size: 0.75em; color:white;" id="meta_map"></span>
                           
                            <?php $derniere_version = @file_get_contents("http://www.alex-box.net/wargames/wrd/rcon/version.php");
                                  if($derniere_version == ''){
                                      $derniere_version = $APIversion;
                                  }
                                  if($APIversion - $derniere_version < 0){
                                      echo '<p style="font-size:0.8em;color:#fff">'.$expression->maj_dispo.'<br />'
                                      . '<a class="link" href="http://games.alex-box.net/aws-wrd-rcon-gerer-un-serveur-wargame/aws-wrd-rcon-telechargement/" target="_blank">'.$expression->telecharge_maj.' ('. $derniere_version.')</a>.</p>';
                                  }  ?>
                        </td>

                        <td class="entete">
                           <i class="fa fa-users" aria-hidden="true"></i>
 <?php echo $expression->LISTE_JOUEURS ?> 
                             <span id="nbjoueurs" class=""></span>
                            <span style="">
                                <input onclick="commandeServeur.listeJoueurs()" 
                                       style="height:14px" 
                                       type="image" 
                                       src="./css/icones/refresh.png" 
                                       value="Changer"/>
                                <input onchange="window.location.reload()"
                                       title="<?php echo $expression->autorefresh ?>" 
                                       style="float: right" type="checkbox"  
                                       id="activeRefreshAuto" value="refresh" />
                            </span>
                           
                        </td> 
                        
                    </tr>
                    
                    <tr>
                        <td  class="label G" style=""><i class="fa fa-caret-right" aria-hidden="true"></i>


                            <?php echo $expression->IP ?>   
                            <input title="<?php echo $expression->titre_synchronise ?>" style="float:right;font-size: 0.5em" type="button" value="<?php echo $expression->synchronise ?>" 
                                        onclick="commandeServeur.synchronise()"/>
                            
                                   
                        </td>
                        <td>
                            <input name="ip" id="ip" class="nombre" type="text"
                                   onchange= "actionCookie.saveAllCookies();"
                                   onmouseup="actionCookie.saveAllCookies();"
                                   onkeyup=  "actionCookie.saveAllCookies();"
                                   
                                   value="<?php echo $_COOKIE['wrd_srv_ip'] ?>"/>
                            
                        </td>
                        <td  rowspan="10">
                            <?php if(isset($_COOKIE['wrd_srv_ip']) && isset($_COOKIE['wrd_srv_port']) && isset($_COOKIE['wrd_srv_mdp'])){
                                
                            } ?>
                                <script> if(document.getElementById('activeRefreshAuto').checked){
                                    commandeServeur.refreshListeJoueurAuto();
                                }else{
                                    commandeServeur.listeJoueurs();
                                }
                                            </script>
                                <?php // } ?>
                            <p>
                                <span id="listejoueur"></span> 
                            </p>
                        </td>
                    </tr>
                    
                    <tr>
                        <td class="label G"><i class="fa fa-caret-right" aria-hidden="true"></i>


                            <?php echo $expression->port ?>
                        </td>
                        <td>
                            <input name="port" id="port" class="nombre" type="text" 
                                   onchange="actionCookie.saveAllCookies();"
                                   onmouseup="actionCookie.saveAllCookies();"
                                   onkeyup="actionCookie.saveAllCookies();"
                                   value="<?php echo $_COOKIE['wrd_srv_port'] ?>"/>
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td class="label G"><i class="fa fa-caret-right" aria-hidden="true"></i>

                            <?php echo $expression->mdp ?>
                        </td>
                        <td>
                            <input name="s_mdp" id="s_mdp" class="nombre" type="text"
                                   onchange="actionCookie.saveAllCookies();"
                                   onmouseup="actionCookie.saveAllCookies();"
                                   onkeyup="actionCookie.saveAllCookies();"
                                   value="<?php echo $_COOKIE['wrd_srv_mdp'] ?>"/>
                        </td>
                        <td></td>
                    </tr>

                    <tr >
                        <td class="entete" style="width:50%" colspan="2" >
                            <i class="fa fa-cogs" aria-hidden="true"></i>  <?php echo $expression->PARAMETRES_DE_JEU ?>
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td class="label G"><i class="fa fa-caret-right" aria-hidden="true"></i>

                            <?php echo $expression->nom_salon ?>
                        </td>
                        <td>
                            <input id="serveurname"  class="text" type="text" name="NOMpartie" 
                                   value="<?php echo $_COOKIE['wrd_srv_nom_lobby'] ?>"
                                   onkeyup="
                                           commandeServeur.sendCommandeStandard('ServerName ' + this.value);
                                           document.getElementById('nom_lobby').innerHTML = this.value;
                                           actionCookie.saveAllCookies();
                                   "/>
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td class="label G"><i class="fa fa-caret-right" aria-hidden="true"></i> 

                            <?php echo $expression->mdp_salon ?>
                        </td>
                        <td>
                            <input id="l_mdp" class="text" type="text" name="MDPpartie"  
                                   value="<?php if (isset($_COOKIE['wrd_srv_mdp_lobby'])) {echo $_COOKIE['wrd_srv_mdp_lobby'];} ?>"
                                   onkeyup="
                                           actionCookie.saveAllCookies();
                                           
                                           commandeServeur.sendCommandeStandard('Password ' + this.value);
                                           
                                           if(this.value.length >= 1){
                                             document.getElementById('verrou').style.visibility='visible';  
                                           }else{
                                             document.getElementById('verrou').style.visibility='hidden'; 
                                           }


                                   "/>
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td class="label G"><i class="fa fa-caret-right" aria-hidden="true"></i> 
                            <?php echo $expression->champ_de_bataille ?>
                            
                            <?php $random_map = random_map($langage) ?>
                            
                            <img title="<?php echo $expression->map_hasard ?>" onclick="
                            var pref_gamemode = '';
                                   
                                    //Permet de selectionner directement la map selon le mode de jeu
                                    if(document.getElementById('gamemode').value === '4') {
                                        pref_gamemode = 'Conquete_';
                                    }else{
                                        pref_gamemode = 'Destruction_'; 
                                    }
                            window.location.reload();
                            commandeServeur.sendCommandeStandard('Map ' + pref_gamemode + '<?php echo $random_map ?>');
                            document.getElementById('map').value='<?php echo $random_map ?>';
                            document.getElementById('imgmap').src = './maps/' + 
                                            '<?php echo $random_map ?>' + '.jpg';
                            " 
                                 style="cursor:pointer;float:right;width:23px" src="./css/img/random.png" />
                        </td>
                        <td>
                            <select id="map" name=""
                                    
                                    onblur="document.getElementById('imgmap').src = './maps/' + 
                                            this.value + '.jpg';
                                            document.getElementById('meta_map').innerHTML = modifierInterface.afficherMetaMap(this.value, '<?php echo $langage ?>');"
                                    onchange="
                                    document.getElementById('imgmap').src = './maps/' + 
                                            this.value + '.jpg';
                                    var pref_gamemode = '';
                                    
                                    //Permet de selectionner directement la map selon le mode de jeu
                                    if(document.getElementById('gamemode').value === '4') {
                                        pref_gamemode = 'Conquete_';
                                    }else{
                                        pref_gamemode = 'Destruction_'; 
                                    }
                                    
                                    commandeServeur.sendCommandeStandard('Map ' + pref_gamemode + this.value);
                                    actionCookie.saveAllCookies();
                                    
                                    document.getElementById('meta_map').innerHTML = modifierInterface.afficherMetaMap(this.value,  '<?php echo $langage ?>'); 
                                    "
                                    
                                    onmouseover="">  
                                    <?php single_cree_liste_map($_COOKIE['wrd_srv_cookiemap']) ?>
                            </select>
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td class="label G"> <i class="fa fa-caret-right" aria-hidden="true"></i> 
                            <?php echo $expression->mode_jeu ?>
                        </td>
                        <td>
                            <select id="gamemode" name="Victoire" onchange="
                                commandeServeur.sendCommandeStandard('VictoryCond ' + this.value);
                                
                                var pref_gamemode = '';
                                    if(this.value === '4') {
                                        pref_gamemode = 'Conquete_';
                                    }else{
                                        pref_gamemode = 'Destruction_'; 
                                    }
                                commandeServeur.sendCommandeStandard('Map ' + pref_gamemode + document.getElementById('map').value);
                                actionCookie.saveAllCookies();
                                document.getElementById('html_income_rate').innerHTML =  
                                modifierInterface.afficheIncomeRate(this.value,document.getElementById('income').value);
                                    ">
                                $style= '  ';
                                <option <?php if ($_COOKIE['wrd_srv_gamemode'] == 1) {
                                    echo ' selected="selected" ';
                                } ?> value="1"
                                     style="background:url('./css/icones/gamemode_1.jpg') no-repeat #29573A; "><?php echo $expression->destruction ?></option>
                                <!--<option value="2">Si�ge</option>-->
                                
                                <option <?php if ($_COOKIE['wrd_srv_gamemode'] == 3) {
                                    echo ' selected="selected" ';
                                    } ?> style="background:url('./css/icones/gamemode_3.jpg') no-repeat #29573A;"
                                    value="3"><?php echo $expression->economie ?></option>
                                
                                <option <?php if ($_COOKIE['wrd_srv_gamemode'] == 4) {
                                    echo ' selected="selected" ';
                                } ?> style="background:url('./css/icones/gamemode_4.jpg') no-repeat #29573A; "
                                value="4"><?php echo $expression->conquete ?></option>

                            </select>
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td class="label G"> <i class="fa fa-caret-right" aria-hidden="true"></i> 
                            <?php echo $expression->opposition ?>
                        </td>
                        <td>
                            <select  id="opposition" name="Victoire" 
                                     onchange="actionCookie.saveAllCookies();
                                commandeServeur.sendCommandeStandard('GameType ' + this.value);"
                                
                                                            >
                                <option style="background:url('./css/icones/nato_vs_pact.png') no-repeat #29573A; "
                                        <?php if ($_COOKIE['wrd_srv_opposition'] == 0) {echo ' selected="selected" ';} ?>value="0">
                                <?php echo $expression->confrontation ?>
                                </option>
                                <option style="background:url('./css/icones/nato_flag.png') no-repeat #29573A; "
                                         <?php if ($_COOKIE['wrd_srv_opposition'] == 1) {echo ' selected="selected" ';} ?>value="1">
                                    <?php echo $expression->blufor ?>
                                </option>
                                <option style="background:url('./css/icones/pact_flag.png') no-repeat #29573A; "
                                    <?php if ($_COOKIE['wrd_srv_opposition'] == 2) {echo ' selected="selected" ';} ?>value="2">
                                    <?php echo $expression->redfor ?>
                                </option>
                            </select>
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                    <tr>
                        <td class="label G"> <i class="fa fa-caret-right" aria-hidden="true"></i> 
                            <?php echo $expression->acces ?>
                            <span style="float:right" id="acces"></span>
                        </td>
                        <td>
                            <select style="font-family: 'FontAwesome';" id="prive" name="Victoire" onchange="
//                                    if (this.value === '0') {
//                                        document.getElementById('verrou').src = './css/icones/verrou.png';
//                                    } else {
//                                        document.getElementById('verrou').src = '';
//                                    }
                                    commandeServeur.sendCommandeStandard('Private ' + this.value);
                                    actionCookie.saveAllCookies();
                                    ">
                                <option style="background:url('./css/icones/public.png') no-repeat #29573A; " <?php if ($_COOKIE['wrd_srv_acces'] == 0) {echo ' selected="selected" ';} ?> value="0">
                                    <?php echo $expression->publique ?>
                                </option>
                                <option style="background:url('./css/icones/prive.png') no-repeat #29573A; " <?php if ($_COOKIE['wrd_srv_acces'] == 1) {echo ' selected="selected" ';} ?> value="1">
                                    
<?php echo $expression->prive ?>
                                </option>

                            </select>
                        </td>
                        <td>
                            
                        </td>
                    </tr>
                    <tr >
                        <td class="entete" style="width:50%" colspan="2" >
                            <i class="fa fa-cog" aria-hidden="true"></i> 
<?php echo $expression->CONFIGURATION_PARTIE ?>
                        </td>
                        <td class="entete" style="width:50%" colspan="2" >
                            <i class="fa fa-cog" aria-hidden="true"></i><i class="fa fa-plus" aria-hidden="true"></i> 
<?php echo $expression->PARAMETRES_AVANCES ?>
                        </td>
                    </tr>
                    <tr>
                        <td class="label G"> <i class="fa fa-caret-right" aria-hidden="true"></i> 
                            <?php echo $expression->equipes ?>
                        </td>
                        <td>
                            <select id="equipes" name="EQUIPE" onchange="
                                    document.getElementById('mts').value = this.value;
                                    document.getElementById('dmts').value = this.value;
                                    document.getElementById('NbMinPlayer').value = parseInt(this.value * 2) + parseInt(document.getElementById('launch_mode').value);
                                    document.getElementById('ptsinit').value = (this.value * <?php echo $reglage->pts_par_joueur ?>);

                                    commandeServeur.sendCommandeStandard('NbMaxPlayer ' + this.value * 2);
                                    commandeServeur.sendCommandeStandard('InitMoney ' + this.value * <?php echo $reglage->pts_par_joueur ?>);
                                    commandeServeur.sendCommandeStandard('NbMinPlayer ' + document.getElementById('NbMinPlayer').value);
                                    commandeServeur.sendCommandeStandard('DeltaMaxTeamSize ' + this.value);
                                    commandeServeur.sendCommandeStandard('MaxTeamSize ' + this.value);
                                    actionCookie.saveAllCookies();
                                    ">

                                   <?php cree_list_equipes($_COOKIE['wrd_srv_equipes']) ?>
                               
                            </select>
                        </td>
                        <td colspan="2" class="label"> <i class="fa fa-caret-right" aria-hidden="true"></i> 
                            <?php echo $expression->commande_manuelle ?> 
                            <input style="margin:0 10px 0 10px;width:60%" 
                                   id="manualcmd" 
                                   class="text" 
                                   type="text" 
                                   onkeyup="">
                            <input style="" 
                                   type='button' 
                                   value='<?php echo $expression->envoyer ?>' 
                                   onclick="commandeServeur.sendCommandeManuelle(document.getElementById('manualcmd').value);"/>
                        </td>
                    </tr>

                    <tr>
                        <td class="label G"> <i class="fa fa-caret-right" aria-hidden="true"></i> 
                            <?php echo $expression->pts_initiaux ?>
                                <span style="float: right">
                                    
                                    <input id="moins_pts_init" type="button" value="<" onmouseup="
                                      
                                    modifierInterface.diminueValeur('ptsinit',1000);
                                    actionCookie.saveAllCookies();
                                    commandeServeur.sendCommandeStandard('InitMoney ' + document.getElementById('ptsinit').value);
                                    modifierInterface.active_desactiveBouton('ptsinit','plus_pts_init','moins_pts_init',1000,19000);" />
                                    
                                    <input id="plus_pts_init" type="button" value=">" onmouseup="
                                      
                                    modifierInterface.augmenteValeur('ptsinit',1000);
                                    actionCookie.saveAllCookies();
                                    commandeServeur.sendCommandeStandard('InitMoney ' + document.getElementById('ptsinit').value);
                                    modifierInterface.active_desactiveBouton('ptsinit','plus_pts_init','moins_pts_init',1000,19000);"
                                    />
                            </span>
                        </td>
                        <td>
                            <input id="ptsinit" class="nombre" type="text" value="<?php echo $_COOKIE['wrd_srv_ptsinit'] ?>" 
                                   onkeyup="
                                           actionCookie.saveAllCookies();
                                           commandeServeur.sendCommandeStandard('InitMoney ' + this.value);
                                   "
                                 />

                        </td>
                        
                        <td style="padding-left:30px;width:30%">
                            <input id="btn_go" type="button" value="<?php echo $expression->demarre_partie ?>" onmouseup="
                                    commandeServeur.demarrerPartie();"/> 
                            
                            <input id="btn_stop" type="button" value="<?php echo $expression->stop_car ?>" onmouseup="
                                    commandeServeur.stopperChrono();"/>

                            <span class="label" style="padding-left: 10px"><?php echo $expression->lancement ?> </span>
                        </td>
                        <td>
                            <select style="" id="launch_mode" name="Victoire" onchange="
                                
                                            document.getElementById('NbMinPlayer').value = parseInt(document.getElementById('equipes').value * 2) + parseInt(this.value);
                                            commandeServeur.sendCommandeStandard('NbMinPlayer ' + document.getElementById('NbMinPlayer').value);
                                            actionCookie.saveAllCookies();
                                    ">


                                <option <?php if ($_COOKIE['wrd_srv_launch_mode'] == 0) {echo ' selected="selected" ';} ?>value="0">
                                    <?php echo $expression->automatique ?>
                                </option>
                                <option <?php if ($_COOKIE['wrd_srv_launch_mode'] == 1) {echo ' selected="selected" ';} ?>value="1">
                                    <?php echo $expression->manuel ?>
                                </option>
                                <option <?php if ($_COOKIE['wrd_srv_launch_mode'] == -1) {echo ' selected="selected" ';} ?>value="-1">
                                    <?php echo $expression->extra ?>
                                </option>
                            </select>
                        </td>

                    </tr>
                    <tr>
                        <td class="label G"> <i class="fa fa-caret-right" aria-hidden="true"></i> 
                            <?php echo $expression->pts_victoire ?>
                            <span style="float: right">
                                <input id="moins_pts_victoire" type="button" value="<" 
                                    onmouseup="
                                      
                                    modifierInterface.diminueValeur('pts_victoire',250);
                                    actionCookie.saveAllCookies();
                                    commandeServeur.sendCommandeStandard('ScoreLimit ' + document.getElementById('pts_victoire').value);
                                    modifierInterface.active_desactiveBouton('pts_victoire','plus_pts_victoire','moins_pts_victoire',250,44750);" />
                                                                <input id="plus_pts_victoire" type="button" value=">" 
                                    onmouseup="
                                      
                                    modifierInterface.augmenteValeur('pts_victoire',250);
                                    actionCookie.saveAllCookies();
                                    commandeServeur.sendCommandeStandard('ScoreLimit ' + document.getElementById('pts_victoire').value);
                                    modifierInterface.active_desactiveBouton('pts_victoire','plus_pts_victoire','moins_pts_victoire',250,44750);"
                                    
                                    />
                                    
                            </span>
                        </td>
                        <td>
                            <input id="pts_victoire" class="nombre" type="text" 
                                   value="<?php echo $_COOKIE['wrd_srv_pts_victoire'] ?>"
                                   onkeyup="
                                           commandeServeur.sendCommandeStandard('ScoreLimit ' + this.value);
                                           actionCookie.saveAllCookies();
                                   ">
                        </td>
                        <td class="label"> <i class="fa fa-caret-right" aria-hidden="true"></i> <?php echo $expression->nbjoueursrequis ?></td>
                        <td><input id="NbMinPlayer" class="nombre" type="text"  <?php echo $disabled ?>
                                   value="<?php echo $_COOKIE['wrd_srv_NbMinPlayer'] ?>"
                                   onkeyup="
                                           commandeServeur.sendCommandeStandard('NbMinPlayer ' + this.value);
                                           actionCookie.saveAllCookies();
                                   "></td>
                    </tr>
                    <tr>
                        <td class="label G"> <i class="fa fa-caret-right" aria-hidden="true"></i> 
                            <?php echo $expression->limite_duree ?>
                            <span style="float: right">
                                    
                                    <input id="moins_tps_limite" type="button" value="<" 
                                    onmouseup="
                                      
                                    modifierInterface.diminueValeur('tps_limite',5 );
                                    actionCookie.saveAllCookies();
                                    commandeServeur.sendCommandeStandard('TimeLimit ' + document.getElementById('tps_limite').value * 60);
                                    modifierInterface.active_desactiveBouton('tps_limite','plus_tps_limite','moins_tps_limite',5,115);" />
                                                                    <input id="plus_tps_limite" type="button" value=">" 
                                    onmouseup="
                                     
                                    modifierInterface.augmenteValeur('tps_limite',5);
                                    actionCookie.saveAllCookies();
                                    commandeServeur.sendCommandeStandard('TimeLimit ' + document.getElementById('tps_limite').value * 60);
                                    modifierInterface.active_desactiveBouton('tps_limite','plus_tps_limite','moins_tps_limite',5,115); "
                                    />
                            </span>
                        </td>
                        <td><input id="tps_limite" class="nombre" type="text"   
                                   value="<?php echo $_COOKIE['wrd_srv_tps_limite'] ?>"
                                   onkeyup="
                                           commandeServeur.sendCommandeStandard('TimeLimit ' + this.value * 60);
                                           actionCookie.saveAllCookies();
                                           ">
                        </td>
                        <td class="label"> <i class="fa fa-caret-right" aria-hidden="true"></i> <?php echo $expression->car ?></td>
                        <td>
                            <input id="tps_declenche" class="nombre" type="text"    
                                   value="<?php echo $_COOKIE['wrd_srv_tps_declenche'] ?>"
                                   onkeyup="
                                           actionCookie.saveAllCookies();
                                           commandeServeur.sendCommandeStandard('WarmupCountdown ' + this.value)
                                   ">
                        </td>
                    </tr>
                    <tr>
                        <td class="label G"> <i class="fa fa-caret-right" aria-hidden="true"></i> 
                            <?php echo $expression->taux_revenu ?>
                            <span style="float:right" id="html_income_rate"></span></td>
                        <td><select id="income" name="REVENU" onchange="
                                actionCookie.saveAllCookies();
                                commandeServeur.sendCommandeStandard('IncomeRate ' + this.value);
                                document.getElementById('html_income_rate').innerHTML =  
                                modifierInterface.afficheIncomeRate(document.getElementById('gamemode').value,this.value);
                                
                                
                                    ">
                                
<?php cree_liste_income_rate($_COOKIE['wrd_srv_gamemode'],$_COOKIE['wrd_srv_income'])?> 
                                
                                

                            </select></td> 
                        <td class="label"> <i class="fa fa-caret-right" aria-hidden="true"></i> <?php echo $expression->tps_deploiement ?></td>
                        <td><input id="tps_deploiement" class="nombre" type="text"     
                                   value="<?php echo $_COOKIE['wrd_srv_tps_deploiement'] ?>"
                                   onkeyup="
                                           actionCookie.saveAllCookies();
                                           commandeServeur.sendCommandeStandard('DeploiementTimeMax ' + this.value)
                                   "/></td>
                    </tr>
                    <tr >
                        <td class="entete" style="width:50%" colspan="2" ><i class="fa fa-minus-circle" aria-hidden="true"></i> 
 <?php echo $expression->CONTRAINTES ?></td>
                        <td class="label"> <i class="fa fa-caret-right" aria-hidden="true"></i> <?php echo $expression->tps_max_chrgt ?></td>
                        <td><input id="tps_chargement" class="nombre" type="text"      
                                   value="<?php echo $_COOKIE['wrd_srv_tps_chargement'] ?>"
                                   onkeyup="
                                           actionCookie.saveAllCookies();
                                           commandeServeur.sendCommandeStandard('LoadingTimeMax ' + this.value)
                                   "></td>
                    </tr>
                    <tr>
                        <td class="label G"> <i class="fa fa-caret-right" aria-hidden="true"></i> 
                            <?php echo $expression->thematique ?></td>
                        <td><select id="contr_theme" name="Victoire" onchange="
                                actionCookie.saveAllCookies();
                                commandeServeur.sendCommandeStandard('ThematicConstraint ' + this.value);
                                document.getElementById('theme').src = './css/img/' + this.value + '_contr_thm.png';

                                    ">
                                <option <?php if ($_COOKIE['wrd_srv_contr_theme'] == -1) {
                                echo ' selected="selected" ';
                            } ?>value="-1"
                            style="background:url('./css/img/-1_contr_thm.png') no-repeat #29573A; ">
                                <?php echo $expression->aucune ?></option>
                                <option <?php if ($_COOKIE['wrd_srv_contr_theme'] == -2) {
                                echo ' selected="selected" ';
                            } ?>value="-2"
                            style="background:url('./css/img/-2_contr_thm.png') no-repeat #29573A; ">
                                <?php echo $expression->quelconque ?>
                                </option>

                                <option <?php if ($_COOKIE['wrd_srv_contr_theme'] == 0) {
                                echo ' selected="selected" ';
                            } ?>value="0"
                            style="background:url('./css/img/0_contr_thm.png') no-repeat #29573A; ">
                                <?php echo $expression->motorise ?>
                                </option>
                                <option <?php if ($_COOKIE['wrd_srv_contr_theme'] == 1) {
                                echo ' selected="selected" ';
                            } ?>value="1"
                            style="background:url('./css/img/1_contr_thm.png') no-repeat #29573A; ">
                                <?php echo $expression->blinde ?>
                                </option>
                                <option <?php if ($_COOKIE['wrd_srv_contr_theme'] == 2) {
                                echo ' selected="selected" ';
                            } ?>value="2"
                            style="background:url('./css/img/2_contr_thm.png') no-repeat #29573A; ">
                                <?php echo $expression->soutien ?></option>
                                <option <?php if ($_COOKIE['wrd_srv_contr_theme'] == 3) {
                                       echo ' selected="selected" ';
                                   } ?>value="3"
                                   style="background:url('./css/img/3_contr_thm.png') no-repeat #29573A; ">
                                       <?php echo $expression->marine ?>
                                </option>
                                <option <?php if ($_COOKIE['wrd_srv_contr_theme'] == 4) {
                                       echo ' selected="selected" ';
                                   } ?>value="4"
                                   style="background:url('./css/img/4_contr_thm.png') no-repeat #29573A; ">
                                       <?php echo $expression->mecanise ?>
                                </option>
                                <option <?php if ($_COOKIE['wrd_srv_contr_theme'] == 5) {
                                       echo ' selected="selected" ';
                                   } ?>value="5"
                                   style="background:url('./css/img/5_contr_thm.png') no-repeat #29573A; ">
                                       <?php echo $expression->aeroporte ?>
                                </option>
                                <option <?php if ($_COOKIE['wrd_srv_contr_theme'] == 6) {
                                echo ' selected="selected" ';
                            } ?>value="6"
                            style="background:url('./css/img/6_contr_thm.png') no-repeat #29573A; ">
                                <?php echo $expression->naval ?>
                                </option>
                            </select></td>
                        <td class="label"> <i class="fa fa-caret-right" aria-hidden="true"></i> <?php echo $expression->tps_debrief ?></td>
                        <td><input id="tps_debrief" class="nombre" type="text"       
                                   value="<?php echo $_COOKIE['wrd_srv_tps_debrief'] ?>"
                                   onkeyup="
                                           actionCookie.saveAllCookies();
                                           commandeServeur.sendCommandeStandard('DebriefingTimeMax ' + this.value)
                                   ">
                    </tr>
                    <tr>
                        <td class="label G"> <i class="fa fa-caret-right" aria-hidden="true"></i> 
                            <?php echo $expression->nat_coal ?></td>
                        <td>
                            <select id="contr_nat_coal" name="Victoire" onchange="
                                    if (this.value !== '-1') {
                                        document.getElementById('nation').src = './css/img/contr_nat.png';
                                    } else {
                                        document.getElementById('nation').src = './css/img/-1_contr_thm.png';
                                    }

                                    actionCookie.saveAllCookies();
                                    commandeServeur.sendCommandeStandard('NationConstraint ' + this.value);
                                    ">
                                <option <?php if ($_COOKIE['wrd_srv_contr_nat_coal'] == -1) {
                                echo ' selected="selected" ';
                            } ?>value="-1"><?php echo $expression->aucune ?></option>
                                <option <?php if ($_COOKIE['wrd_srv_contr_nat_coal'] == 0) {
                                echo ' selected="selected" ';
                            } ?>value="0"><?php echo $expression->nation_coal ?></option>
                                <option <?php if ($_COOKIE['wrd_srv_contr_nat_coal'] == 1) {
                                echo ' selected="selected" ';
                            } ?>value="1"><?php echo $expression->nations ?></option>
                                <option <?php if ($_COOKIE['wrd_srv_contr_nat_coal'] == 2) {
                                echo ' selected="selected" ';
                            } ?>value="2"><?php echo $expression->coalitions ?></option>
                            </select>

                        </td>
                        <td class="label"> <i class="fa fa-caret-right" aria-hidden="true"></i> 
                            <?php echo $expression->DMTS ?>
                        </td>
                        <td>
                            <input id="dmts" class="nombre" type="text" <?php echo $disabled ?>        
                                   value="<?php echo $_COOKIE['wrd_srv_dmts'] ?>"
                                   onkeyup="
                                           actionCookie.saveAllCookies();
                                           commandeServeur.sendCommandeStandard('DeltaMaxTeamSize ' + this.value)"> 
                        </td>
                    </tr>
                    <tr>
                        <td class="label G B"> <i class="fa fa-caret-right" aria-hidden="true"></i> 
                            <?php echo $expression->epoque ?></td>
                        <td>
                            <select id="contr_date" name="Victoire" onchange="
                                    document.getElementById('epoque').src = './css/img/' + this.value + '_contr_ere.png';
                                    actionCookie.saveAllCookies();
                                    commandeServeur.sendCommandeStandard('DateConstraint ' + this.value);
                                    ">
                                <option <?php if ($_COOKIE['wrd_srv_contr_date'] == -1) {
                                echo ' selected="selected" ';
                            } ?>value="-1"
                            style="background:url('./css/img/-1_contr_ere.png') no-repeat #29573A; ">
                                <?php echo $expression->aucune ?>
                                </option>
                                <option <?php if ($_COOKIE['wrd_srv_contr_date'] == 0) {
                                echo ' selected="selected" ';
                            } ?>value="0"
                            style="background:url('./css/img/0_contr_ere.png') no-repeat #29573A; ">
                                <?php echo $expression->pre85 ?>
                                </option>

                                <option <?php if ($_COOKIE['wrd_srv_contr_date'] == 1) {
                                echo ' selected="selected" ';
                            } ?>value="1"
                            style="background:url('./css/img/1_contr_ere.png') no-repeat #29573A; ">
                                <?php echo $expression->pre80 ?>
                                </option>

                            </select> 
                        </td>
                        <td class="label B"> <i class="fa fa-caret-right" aria-hidden="true"></i> 
                            <?php echo $expression->nb_joueur_par_eq ?></td>
                        <td class=""><input id="mts" class="nombre" type="text" <?php echo $disabled ?>       
                                   value="<?php echo $_COOKIE['wrd_srv_mts'] ?>"
                                   onkeyup="
                                           actionCookie.saveAllCookies();
                                           commandeServeur.sendCommandeStandard('MaxTeamSize ' + this.value)"></td>
                    </tr>
                </tbody>
            </table>

        </div>
        <script> 
            document.getElementById('imgmap').src = './maps/' + document.getElementById('map').value + '.jpg';
            document.getElementById('nom_lobby').innerHTML = document.getElementById('serveurname').value;

            if (document.getElementById('contr_nat_coal').value !== '-1') {
                document.getElementById('nation').src = './css/img/contr_nat.png';
            } else {
                document.getElementById('nation').src = './css/img/-1_contr_thm.png';
            }
            document.getElementById('theme').src = './css/img/' + document.getElementById('contr_theme').value + '_contr_thm.png';
            document.getElementById('epoque').src = './css/img/' + document.getElementById('contr_date').value + '_contr_ere.png';
            commandeServeur.listeJoueurs(); 
            
            if(document.getElementById('l_mdp').value.length >= 1){
                 document.getElementById('verrou').style.visibility='visible';  
                                           }else{
                document.getElementById('verrou').style.visibility='hidden'; 
                                           }
            document.getElementById('html_income_rate').innerHTML = 
                    modifierInterface.afficheIncomeRate(document.getElementById('gamemode').value,
                                                        document.getElementById('income').value);
                    document.getElementById('meta_map').innerHTML = 
                            modifierInterface.afficherMetaMap(document.getElementById('map').value,
                            '<?php echo $langage ?>'); 
             
                    </script>
        <p id="reponse"><?php echo $expression->reponse_serveur ?> : <span id="txtHint"></span>
            <a target="_blank" href="http://games.alex-box.net/aws-wrd-rcon-gerer-un-serveur-wargame/"><img width="30" style="float:right" src="./css/icones/help.png" /></a><br />
            <a class="link" style="font-size: 0.5em" href="supprcookies.php"><?php echo $expression->supprimer_cookies ?></a></p> 
        <p  style="font-size:0.5em;color:#fff">AW WRD Rcon v. <?php echo $APIversion ?></p>
         <script>
         commandeServeur.chercheStatusServeur();

           
            </script>

    </body>
</html>


