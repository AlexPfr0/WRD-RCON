

var CommandeServeur = function () {

// Envoyer une commande standard.
// Une commande standard est une commande qui commence par "setsvar".
// La plupart des commandes serveur commence par "setsvar".
// Notez le s au milieu pour Serveur

    this.sendCommandeStandard = function (Commande) {

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function () {

            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {

                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;

            }
        };

        xmlhttp.open("GET", "clsRcon.php?value=setsvar " + Commande, true);

        xmlhttp.send();

    };

// Changer un joueur de camp
// Paramètres : Id du joueur, Camp vers lequel bouger le joueur (0 = BLUFOR, 1 = REDFOR)

    this.moveJoueur = function (ClientID, Alliance) {

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function () {

            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {

                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };

        xmlhttp.open("GET", "clsRcon.php?value=setpvar " + ClientID + " PlayerAlliance " + Alliance, true);

        xmlhttp.send();

    };


// Bannir un joueur
// Paramètres : ID du jourée, Durée de banissement en heure(s)

    this.banJoueur = function (ClientID, Duree) {

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function () {

            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {

                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };

        xmlhttp.open("GET", "clsRcon.php?value=ban " + ClientID + " " + Duree, true);

        xmlhttp.send();

        // Rafraichissement de la liste de joueurs
        var commandeServeur = new CommandeServeur();
        commandeServeur.listeJoueurs();

    };

// Ejecter un joueur du lobby
// Paramètre : Id du joueur

    this.kickJoueur = function (ClientID) {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {

                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };

        xmlhttp.open("GET", "clsRcon.php?value=kick " + ClientID, true);

        xmlhttp.send();

        // Rafraichissement de la liste de joueurs
        var commandeServeur = new CommandeServeur();
        commandeServeur.listeJoueurs();

    };

// Crée la liste des joueurs
   this.listeJoueurs = function () {

        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {

                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;

                // Si la commande retrourne une liste avec au moins un joueur               
                if (xmlhttp.responseText.indexOf('Client List') !== -1) {

                    // Crée la liste de joueurs au format HTML (voir fonction ci-dessous)
                    var commandeServeur = new CommandeServeur();
                    commandeServeur.creeListeJoueurs(xmlhttp.responseText);

                }
                // Si la commande retourne une liste vide                
                if (xmlhttp.responseText.indexOf('Server is empty') !== -1) {
                    var vide = "Le salon est vide !";
                    document.getElementById("listejoueur").innerHTML = '<div id="item_joueur" class="item_joueur">' + vide + '</div>';

                }
            }
        };

        xmlhttp.open("GET", "clsRcon.php?value=display_all_clients", true);

        xmlhttp.send();
        
        

    };

// Rafraichissement automatique de la liste de joueurs
// Paramètre : 5000 pour 5 secondes. Attention, un rafraichissement plus court peut consommer des ressources.
    this.refreshListeJoueurAuto = function(){
        if(document.getElementById('activeRefreshAuto').checked){
            var commandeServeur = new CommandeServeur();
setInterval(function(){ commandeServeur.listeJoueurs(); }, 5000);
        }
        
    };
    this.isConnecte = function(){
        if(document.getElementById('txtHint').innerHTML.indexOf('perdue') > -1){
                document.getElementById('connexion').src = './css/icones/disconnected.png';
                document.getElementById('connexion').title = 'Non connecté';
            }else{
                document.getElementById('connexion').src = './css/icones/connected.png';
                document.getElementById('connexion').title = 'Connecté';
            };
    };
    this.chercheStatusServeur = function(){
        var commandeServeur = new CommandeServeur();
        setInterval(function() {commandeServeur.isConnecte();},5000);
            
    };
    
    this.pingServeur = function (url) {
    
};



// Crée la liste de joueurs au format HTML
// Dans un premier temps, on splite la chaine.
// A chaque retour de ligne, nous avons un joueur + son ID
    this.creeListeJoueurs = function (Reponse) {
        var listejoueur = Reponse;

        var listejoueur1 = listejoueur.replace("\0", "");
        var listejoueur2 = listejoueur1.replace("Client List :\n", '');

        var listejoueur3 = listejoueur2.split("\n");
        var nb_joueur = listejoueur3.length - 1;
        var list = '<div class="liste_joueurs">';
        var joueur = "";

        //Pour chaque joueur, on crée un item (Ban, kick, Nom, Blufor, Redfor)
        //L'Id du joueur s'affiche dans un infobulle lors du passage sur son item.
        for (var i = 0; i < listejoueur3.length - 1; i++) {

            var ID = listejoueur3[i].split(" ");
            ID = ID[0];

            joueur = listejoueur3[i].substring(ID.length, listejoueur3[i].length);
            if (joueur.length > 19) {
                joueur = joueur.substring(0, 19) + '...';
            }
            var num = i + 1;
            var button_kick = '<input title="Kick" onclick="commandeServeur.kickJoueur(' + ID + ')" style="height:14px" type="image" src="./css/icones/kick.png" />';
            var button_ban  = '<input title="Ban" onclick="commandeServeur.banJoueur(' + ID + ', 1)" style="height:14px" type="image" src="./css/icones/ban.png" value="Ejecter"/>';
            var button_red  = '<input id="btn_red" onclick="commandeServeur.moveJoueur(' + ID + ', 1)" style="height:14px" type="image" src="./css/icones/1_team.png" value="Changer"/>';
            var button_blue = '<input id="btn_blue" onclick="commandeServeur.moveJoueur(' + ID + ', 0)" style="height:14px" type="image" src="./css/icones/0_team.png" value="Changer"/>';
            list += '<div class="item_joueur" title="ID : ' + ID + '"><span class="num"> ' + num + '</span> ' + button_ban + button_kick + ' ' + joueur + '<span style="margin-right:2px;float:right">' + button_blue + button_red + '</span></div><br />';
        }
        list += '</div>';

        document.getElementById("listejoueur").innerHTML = list;
        document.getElementById("nbjoueurs").innerHTML = ' (' + nb_joueur + ') ';
    };

//Envoie la commande tapée dans le champ commande manuelle
//Cette commande doit être reconnue par le serveur
//Cette commande est stricte (sensible à la casse)
    this.sendCommandeManuelle = function (Commande) {

        var xmlhttp = new XMLHttpRequest();

        xmlhttp.onreadystatechange = function () {

            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {

                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;

            }
        };

        xmlhttp.open("GET", "clsRcon.php?value=" + Commande, true);

        xmlhttp.send();
    };
    
this.demarrerPartie = function(){
    
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {

                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };

        xmlhttp.open("GET", "clsRcon.php?value=launch", true);

        xmlhttp.send();
};

this.stopperChrono = function(){
    
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (xmlhttp.readyState === 4 && xmlhttp.status === 200) {

                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };

        xmlhttp.open("GET", "clsRcon.php?value=cancel_launch", true);

        xmlhttp.send();
};

this.synchronise = function(){
        var pref_gamemode = '';
    if (document.getElementById('gamemode').value === '4') {
        pref_gamemode = 'Conquete_';
    } else {
        pref_gamemode = 'Destruction_';
    }

    var commandeServeur = new CommandeServeur();
    commandeServeur.sendCommandeStandard('NbMaxPlayer ' + document.getElementById('equipes').value * 2);
    commandeServeur.sendCommandeStandard('InitMoney ' + document.getElementById('equipes').value * 1000);
    commandeServeur.sendCommandeStandard('NbMinPlayer ' + document.getElementById('NbMinPlayer').value);
    commandeServeur.sendCommandeStandard('DeltaMaxTeamSize ' + document.getElementById('equipes').value);
    commandeServeur.sendCommandeStandard('MaxTeamSize ' + document.getElementById('equipes').value);
    commandeServeur.sendCommandeStandard('ServerName ' + document.getElementById('serveurname').value);
    commandeServeur.sendCommandeStandard('Private ' + document.getElementById('prive').value);
    commandeServeur.sendCommandeStandard('InitMoney ' + document.getElementById('ptsinit').value);
    commandeServeur.sendCommandeStandard('TimeLimit ' + document.getElementById('tps_limite').value * 60);
    commandeServeur.sendCommandeStandard('ScoreLimit ' + document.getElementById('pts_victoire').value);
    commandeServeur.sendCommandeStandard('GameType ' + document.getElementById('opposition').value);
    commandeServeur.sendCommandeStandard('Map ' + pref_gamemode + document.getElementById('map').value);
//    commandeServeur.sendCommandeStandard('NbMinPlayer ' + document.getElementById('NbMinPlayer').value);
    commandeServeur.sendCommandeStandard('Password ' + document.getElementById('l_mdp').value);
    commandeServeur.sendCommandeStandard('NationConstraint ' + document.getElementById('contr_nat_coal').value);
    commandeServeur.sendCommandeStandard('DateConstraint ' + document.getElementById('contr_date').value);
    commandeServeur.sendCommandeStandard('ThematicConstraint ' + document.getElementById('contr_theme').value);
//    commandeServeur.sendCommandeStandard('NbMinPlayer ' + document.getElementById('NbMinPlayer').value);
    commandeServeur.sendCommandeStandard('VictoryCond ' + document.getElementById('gamemode').value);
    commandeServeur.sendCommandeStandard('WarmupCountdown ' + document.getElementById('tps_declenche').value);
    commandeServeur.sendCommandeStandard('IncomeRate ' + document.getElementById('income').value);
    commandeServeur.sendCommandeStandard('DeploiementTimeMax ' + document.getElementById('tps_deploiement').value);
    commandeServeur.sendCommandeStandard('LoadingTimeMax ' + document.getElementById('tps_chargement').value);
    commandeServeur.sendCommandeStandard('DebriefingTimeMax ' + document.getElementById('tps_debrief').value);
    };
    





};




