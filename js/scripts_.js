

function createCookie(name, value, days) {
                if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    var expires = "; expires=" + date.toGMTString();
                }
                else
                    var expires = "";
                document.cookie = name + "=" + value + expires + "; path=/";
            }

function readCookie(name) {
                var nameEQ = name + "=";
                var ca = document.cookie.split(';');
                for (var i = 0; i < ca.length; i++) {
                    var c = ca[i];
                    while (c.charAt(0) == ' ')
                        c = c.substring(1, c.length);
                    if (c.indexOf(nameEQ) == 0)
                        return c.substring(nameEQ.length, c.length);
                }
                return null;
            }

function eraseCookie(name) {
	createCookie(name,"",-1);
}

function modifieCookie(name, value, days){
    eraseCookie(name);
    createCookie(name, value, days);
}
            

function sendCmd(str) {
                if (str.length === 0) {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                            document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                            
                        }
                    };
                    //xmlhttp.open("GET", "clsRcon.php?name=" + name, true);
                    xmlhttp.open("GET", "clsRcon.php?value=setsvar " + str, true);

                    xmlhttp.send();
                }
            }

function sendCmd2(str) {
                if (str.length === 0) {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                            
            document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
                            
            if(xmlhttp.responseText.indexOf('Client List') !== -1){
                             creeListeJoueurs(xmlhttp.responseText);   
                            }
            if(xmlhttp.responseText.indexOf('Server is empty') !== -1){
                var vide =   "Le serveur est vide !";
               document.getElementById("listejoueur").innerHTML = '<div class="item_joueur">'+ vide +'</div>';
                                
                            }
                     
                            
                            
                                
                         }
                    };
                    //xmlhttp.open("GET", "clsRcon.php?name=" + name, true);
                    xmlhttp.open("GET", "clsRcon.php?value=" + str, true);

                    xmlhttp.send();
                }
            }

function kick_client(clientID){
    if (clientID.length === 0) {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                            
                            
                            
            document.getElementById("txtHint").innerHTML = xmlhttp.responseText.split("\n");
             }
                    };
                    //xmlhttp.open("GET", "clsRcon.php?name=" + name, true);
                    xmlhttp.open("GET", "clsRcon.php?value=kick " + clientID, true);

                    xmlhttp.send();
                    
                    sendCmd2('display_all_clients');
                }
}

function ban_client(clientID){
    if (clientID.length === 0) {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                            
                            
                            
            document.getElementById("txtHint").innerHTML = xmlhttp.responseText.split("\n");
             }
                    };
                    //xmlhttp.open("GET", "clsRcon.php?name=" + name, true);
                    xmlhttp.open("GET", "clsRcon.php?value=ban " + clientID + " 1", true);

                    xmlhttp.send();
                    
                    sendCmd2('display_all_clients');
                }
}

function move_client_to_red(clientID){
    if (clientID.length === 0) {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                            
                    
                            
            document.getElementById("txtHint").innerHTML = xmlhttp.responseText.split("\n");
             }
                    };
                    //xmlhttp.open("GET", "clsRcon.php?name=" + name, true);
                    xmlhttp.open("GET", "clsRcon.php?value=setpvar " + clientID + " PlayerAlliance 1 " , true);

                    xmlhttp.send();
                }
}

function move_client_to_blue(clientID){
    if (clientID.length === 0) {
                    document.getElementById("txtHint").innerHTML = "";
                    return;
                } else {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function () {
                        if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {
                            
                    
                            
//            document.getElementById("txtHint").innerHTML = xmlhttp.responseText.split("\n");
             }
                    };
                    //xmlhttp.open("GET", "clsRcon.php?name=" + name, true);
                    xmlhttp.open("GET", "clsRcon.php?value=setpvar " + clientID + " PlayerAlliance 0 " , true);

                    xmlhttp.send();
                }
}

function creeListeJoueurs(reponse){
    var listejoueur = reponse;
   
                                var listejoueur1 = listejoueur.replace("\0", "");
                                var listejoueur2 = listejoueur1.replace("Client List :\n",'');
                               
                                var listejoueur3 = listejoueur2.split("\n");
                                var nb_joueur = listejoueur3.length - 1;
                                var list = '<div class="liste_joueurs">';
                                var  joueur = "";
                                for(var i = 0;  i < listejoueur3.length - 1;i++){
                                    
                                    var ID = listejoueur3[i].split(" ");
                                    ID = ID[0];
                                    
                                    joueur = listejoueur3[i].substring(ID.length , listejoueur3[i].length);
                                    if(joueur.length > 19){
                                        joueur = joueur.substring(0,19) + '...'; 
                                    }
                                    var num = i + 1;
                                    var button_kick = '<input  onclick="commandeServeur.kickJoueur('+ ID +')" style="height:14px" type="image" src="./css/icones/kick.png" />';
                                    var button_ban = '<input onclick="commandeServeur.banJoueur('+ ID +', 1)" style="height:14px" type="image" src="./css/icones/ban.png" value="Ejecter"/>';
                                    var button_red = '<input onclick="commandeServeur.moveJoueur('+ ID +', 1)" style="height:14px" type="image" src="./css/icones/1_team.png" value="Changer"/>';
                                    var button_blue = '<input onclick="commandeServeur.moveJoueur('+ ID +', 0)" style="height:14px" type="image" src="./css/icones/0_team.png" value="Changer"/>';
        list += '<div class="item_joueur" title="ID : '+ ID +'"><span class="num"> '+ num + '</span> ' + button_ban + button_kick  + ' ' +  joueur + '<span style="float:right">'+ button_blue + button_red+'</span></div><br />';
                                }
                               list += '</div>';
                               
                                document.getElementById("listejoueur").innerHTML = list  ;
                                document.getElementById("nbjoueurs").innerHTML = ' ('+ nb_joueur +') ';
}
    
function saveAllCookies(){
             
        createCookie('wrd_srv_ip', document.getElementById('ip').value, 30);
        createCookie('wrd_srv_port', document.getElementById('port').value, 30);
        createCookie('wrd_srv_mdp', document.getElementById('s_mdp').value, 30);
        
        createCookie('wrd_srv_nom_lobby', document.getElementById('serveurname').value, 30);
        createCookie('wrd_srv_cookiemap', document.getElementById('map').value, 30);
        createCookie('wrd_srv_mdp_lobby', document.getElementById('l_mdp').value, 30);
        createCookie('wrd_srv_gamemode', document.getElementById('gamemode').value, 30);
	createCookie('wrd_srv_opposition', document.getElementById('opposition').value, 30);
        createCookie('wrd_srv_acces', document.getElementById('prive').value, 30);
	createCookie('wrd_srv_equipes', document.getElementById('equipes').value, 30);
	createCookie('wrd_srv_ptsinit', document.getElementById('ptsinit').value, 30);
	createCookie('wrd_srv_launch_mode', document.getElementById('launch_mode').value, 30);
	createCookie('wrd_srv_pts_victoire', document.getElementById('pts_victoire').value, 30);
	createCookie('wrd_srv_NbMinPlayer', document.getElementById('NbMinPlayer').value, 30);
	createCookie('wrd_srv_tps_limite', document.getElementById('tps_limite').value, 30);
        createCookie('wrd_srv_tps_declenche', document.getElementById('tps_declenche').value, 30);
	createCookie('wrd_srv_income', document.getElementById('income').value, 30);
	createCookie('wrd_srv_tps_deploiement', document.getElementById('tps_deploiement').value, 30);
	createCookie('wrd_srv_tps_chargement', document.getElementById('tps_chargement').value, 30);
	createCookie('wrd_srv_contr_theme', document.getElementById('contr_theme').value, 30);
	createCookie('wrd_srv_tps_debrief', document.getElementById('tps_debrief').value, 30);
	createCookie('wrd_srv_contr_nat_coal', document.getElementById('contr_nat_coal').value, 30);
	createCookie('wrd_srv_dmts', document.getElementById('dmts').value, 30);
	createCookie('wrd_srv_contr_date', document.getElementById('contr_date').value, 30);
	createCookie('wrd_srv_mts', document.getElementById('mts').value, 30);
    
    
}

function Synchronise(){
    
    var pref_gamemode = '';
    if (document.getElementById('gamemode').value === '4') {
        pref_gamemode = 'Conquete_';
    } else {
        pref_gamemode = 'Destruction_';
    }

    
    sendCmd('NbMaxPlayer ' + document.getElementById('equipes').value * 2);
    sendCmd('InitMoney ' + document.getElementById('equipes').value * 1000);
    sendCmd('NbMinPlayer ' + document.getElementById('NbMinPlayer').value);
    sendCmd('DeltaMaxTeamSize ' + document.getElementById('equipes').value);
    sendCmd('MaxTeamSize ' + document.getElementById('equipes').value);
    sendCmd('ServerName ' + document.getElementById('serveurname').value);
    sendCmd('Private ' + document.getElementById('prive').value);
    sendCmd('InitMoney ' + document.getElementById('ptsinit').value);
    sendCmd('TimeLimit ' + document.getElementById('tps_limite').value * 60);
    sendCmd('ScoreLimit ' + document.getElementById('pts_victoire').value);
    sendCmd('GameType ' + document.getElementById('opposition').value);
    sendCmd('Map ' + pref_gamemode + document.getElementById('map').value);
    sendCmd('NbMinPlayer ' + document.getElementById('NbMinPlayer').value);
    sendCmd('Password ' + document.getElementById('l_mdp').value);
    sendCmd('NationConstraint ' + document.getElementById('contr_nat_coal').value);
    sendCmd('DateConstraint ' + document.getElementById('contr_date').value);
    sendCmd('ThematicConstraint ' + document.getElementById('contr_theme').value);
    sendCmd('NbMinPlayer ' + document.getElementById('NbMinPlayer').value);
    sendCmd('VictoryCond ' + document.getElementById('gamemode').value);
    sendCmd('WarmupCountdown ' + document.getElementById('tps_declenche').value);
    sendCmd('IncomeRate ' + document.getElementById('income').value);
    sendCmd('DeploiementTimeMax ' + document.getElementById('tps_deploiement').value);
    sendCmd('LoadingTimeMax ' + document.getElementById('tps_chargement').value);
    sendCmd('DebriefingTimeMax ' + document.getElementById('tps_debrief').value);
    
    
//    document.getElementById('nom_lobby').innerHTML = document.getElementById('serveurname').value;
//    document.getElementById('imgmap').src = './maps/' + document.getElementById('map').value + '.jpg';
//    document.getElementById('mts').value = document.getElementById('equipes').value;
//    document.getElementById('dmts').value = document.getElementById('equipes').value;
//    document.getElementById('NbMinPlayer').value = parseInt(document.getElementById('equipes').value * 2) + parseInt(document.getElementById('launch_mode').value);
//    document.getElementById('ptsinit').value = (document.getElementById('equipes').value * 1000);
//    document.getElementById('NbMinPlayer').value = parseInt(document.getElementById('equipes').value * 2) + parseInt(document.getElementById('launch_mode').value);
//    document.getElementById('theme').src = './css/img/' + document.getElementById('contr_theme').value + '_contr_thm.png';
//    document.getElementById('epoque').src = './css/img/' + document.getElementById('contr_date').value + '_contr_ere.png';
//    
//    saveAllCookies();
}
            
    
     
