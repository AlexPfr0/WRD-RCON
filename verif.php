<?php

require "./ini.php";
$param = new reglage();

$site_mdp_POST = filter_input(INPUT_POST, 'site_mdp');

if (isset($site_mdp_POST) and $site_mdp_POST == $param->site_mdp) {
    $expire = time() + (30 * 24 * 3600);
    setcookie('wrd_srv_site_mdp', $param->site_mdp, $expire, '/', '', false, false);

    setcookie('wrd_srv_ip', "xx.xx.xx.xx", $expire, '/', '', false, false);
    setcookie('wrd_srv_port', "12345", $expire, '/', '', false, false);
    setcookie('wrd_srv_mdp', "xxxxxx", $expire, '/', '', false, false);


    setcookie('wrd_srv_cookiemap', "3x3_Montagne_1", $expire, '/', '', false, false);
    setcookie('wrd_srv_nom_lobby', "Mon salon Wargame", $expire, '/', '', false, false);
    setcookie('wrd_srv_mdp_lobby', "", $expire, '/', '', false, false);
    setcookie('wrd_srv_gamemode', "1", $expire, '/', '', false, false);
    setcookie('wrd_srv_opposition', "0", $expire, '/', '', false, false);
    setcookie('wrd_srv_acces', "0", $expire, '/', '', false, false);
    setcookie('wrd_srv_equipes', "5", $expire, '/', '', false, false);
    setcookie('wrd_srv_ptsinit', "5000", $expire, '/', '', false, false);
    setcookie('wrd_srv_launch_mode', "0", $expire, '/', '', false, false);
    setcookie('wrd_srv_pts_victoire', "2500", $expire, '/', '', false, false);
    setcookie('wrd_srv_NbMinPlayer', "10", $expire, '/', '', false, false);
    setcookie('wrd_srv_tps_limite', "45", $expire, '/', '', false, false);
    setcookie('wrd_srv_tps_declenche', "15", $expire, '/', '', false, false);
    setcookie('wrd_srv_income', "3", $expire, '/', '', false, false);
    setcookie('wrd_srv_tps_deploiement', "180", $expire, '/', '', false, false);
    setcookie('wrd_srv_tps_chargement', "30", $expire, '/', '', false, false);
    setcookie('wrd_srv_contr_theme', "-1", $expire, '/', '', false, false);
    setcookie('wrd_srv_tps_debrief', "60", $expire, '/', '', false, false);
    setcookie('wrd_srv_contr_nat_coal', "-1", $expire, '/', '', false, false);
    setcookie('wrd_srv_dmts', "5", $expire, '/', '', false, false);
    setcookie('wrd_srv_contr_date', "-1", $expire, '/', '', false, false);
    setcookie('wrd_srv_mts', "5", $expire, '/', '', false, false);

    header('Location: ./index.php');
} else {
    header("Location: ./home.php");
}


