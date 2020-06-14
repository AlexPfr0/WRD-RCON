
var ActionCookie = function(){
    
    // Met les cookies à jour. Cette fonction est appelée à chanque changement de valeur dans l'interface
    // La variable "expire" indique la durée en jouer avant que le cookie soit effacé.
    // Cette durée est remis à "expire" jour à chaque mise à jour
    
    this.saveAllCookies = function(){
        
        // Durée de vie du cookie
        var expire = '30';
        var actionCookie = new ActionCookie();
        
        actionCookie.creeCookie('wrd_srv_ip', document.getElementById('ip').value, expire);
        actionCookie.creeCookie('wrd_srv_port', document.getElementById('port').value, expire);
        actionCookie.creeCookie('wrd_srv_mdp', document.getElementById('s_mdp').value, expire);
        
        actionCookie.creeCookie('wrd_srv_nom_lobby', document.getElementById('serveurname').value, expire);
        actionCookie.creeCookie('wrd_srv_cookiemap', document.getElementById('map').value, expire);
        actionCookie.creeCookie('wrd_srv_mdp_lobby', document.getElementById('l_mdp').value, expire);
        actionCookie.creeCookie('wrd_srv_gamemode', document.getElementById('gamemode').value, expire);
	actionCookie.creeCookie('wrd_srv_opposition', document.getElementById('opposition').value, expire);
        actionCookie.creeCookie('wrd_srv_acces', document.getElementById('prive').value, expire);
	actionCookie.creeCookie('wrd_srv_equipes', document.getElementById('equipes').value, expire);
	actionCookie.creeCookie('wrd_srv_ptsinit', document.getElementById('ptsinit').value, expire);
	actionCookie.creeCookie('wrd_srv_launch_mode', document.getElementById('launch_mode').value, expire);
	actionCookie.creeCookie('wrd_srv_pts_victoire', document.getElementById('pts_victoire').value, expire);
	actionCookie.creeCookie('wrd_srv_NbMinPlayer', document.getElementById('NbMinPlayer').value, expire);
	actionCookie.creeCookie('wrd_srv_tps_limite', document.getElementById('tps_limite').value, expire);
        actionCookie.creeCookie('wrd_srv_tps_declenche', document.getElementById('tps_declenche').value, expire);
	actionCookie.creeCookie('wrd_srv_income', document.getElementById('income').value, expire);
	actionCookie.creeCookie('wrd_srv_tps_deploiement', document.getElementById('tps_deploiement').value, expire);
	actionCookie.creeCookie('wrd_srv_tps_chargement', document.getElementById('tps_chargement').value, expire);
	actionCookie.creeCookie('wrd_srv_contr_theme', document.getElementById('contr_theme').value, expire);
	actionCookie.creeCookie('wrd_srv_tps_debrief', document.getElementById('tps_debrief').value, expire);
	actionCookie.creeCookie('wrd_srv_contr_nat_coal', document.getElementById('contr_nat_coal').value, expire);
	actionCookie.creeCookie('wrd_srv_dmts', document.getElementById('dmts').value, expire);
	actionCookie.creeCookie('wrd_srv_contr_date', document.getElementById('contr_date').value, expire);
	actionCookie.creeCookie('wrd_srv_mts', document.getElementById('mts').value, expire);
        
    };
    
    this.savePreset = function(preset){
        var actionCookie = new ActionCookie();
        var expire = 360;
        var ip = document.getElementById('ip').value;
        var port = document.getElementById('port').value;
        var mdp = document.getElementById('s_mdp').value;
        var cookie = ip +'|'+port+'|'+mdp;
        actionCookie.creeCookie('wrd_srv_preset_' + preset, cookie, expire);
    };
    
    this.chargePreset = function(preset){
        var expire = 30;
        var actionCookie = new ActionCookie();
        var cookie = actionCookie.litCookie('wrd_srv_preset_' + preset);
        var IP = cookie.split('|')[0];
        var port = cookie.split('|')[1];
        var s_mdp = cookie.split('|')[2];
        
        document.getElementById('ip').value = IP;
        document.getElementById('port').value = port;
        document.getElementById('s_mdp').value = s_mdp;
        
        actionCookie.creeCookie('wrd_srv_ip', document.getElementById('ip').value, expire);
        actionCookie.creeCookie('wrd_srv_port', document.getElementById('port').value, expire);
        actionCookie.creeCookie('wrd_srv_mdp', document.getElementById('s_mdp').value, expire);
        
    };
    
    // Crée les cookies sans recharger la page, ce qu'exigeait PHP.
    this.creeCookie = function(name, value, days){
        if (days) {
                    var date = new Date();
                    date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
                    var expires = "; expires=" + date.toGMTString();
                }
                else
                    var expires = "";
                document.cookie = name + "=" + value + expires + "; path=/";
    };
    
    this.litCookie = function (name) {
	var nameEQ = name + "=";
	var ca = document.cookie.split(';');
	for(var i=0;i < ca.length;i++) {
		var c = ca[i];
		while (c.charAt(0)==' ') c = c.substring(1,c.length);
		if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
	}
	return null;
};
};


