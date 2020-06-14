<?php


function get_map_name($map_name){
//    $map_img_name = get_map_info($map_name)["nom_img"];
    
    include "./maplist.php";
    return $maps[$map_name];
}

function liste_map(){
    $dir = "./maps";
    
    $liste_maps = scandir($dir);
    
    return ($liste_maps);
}

function single_cree_liste_map($cookiemap){
    
//    $liste_map_tab = liste_map();
    include "maplist.php";
    
    //require "ini.php";
    $reglage = new reglage();
    $langage = $reglage->langage;
    
    
    $liste_map_tab = $maps[$langage];
    if(!isset($liste_map_tab)){
        $liste_map_tab = $maps['EN_en'];
    }
    
    $selected = '';
    foreach ($liste_map_tab as $k => $v) {
        
//        if ($map != '.' && $map != '..') {
            $cmd_map = $k;
            $map_name = $v[0];
            $nbj = $v[1];
            
            
            $style= ' style="background:url(\'./css/icones/'. $nbj .'.jpg\') no-repeat #29573A; " ';
            
            if ($cmd_map == $cookiemap) {
                $selected = ' selected="selected" ';
            }
            
            echo '<option  
                class="map_name" 
                onmouseover="document.getElementById(\'imgmap\').src = \'./maps/\' + 
                this.value + \'.jpg\';
                document.getElementById(\'meta_map\').innerHTML = modifierInterface.afficherMetaMap(this.value,\''.$langage.'\');"' . $style . $selected . ' id="' . $cmd_map . '"'
                    . ' value="' . $cmd_map . ''
                    . '">'. $map_name .'</option>';
            $selected = '';
        $style = '';
        
            
//            }
    }
}


function cree_list_equipes($cookieequipe){
    
    for($i=1;$i<11;$i++){
        $selected = "";
      if($cookieequipe == $i){
           $selected = ' selected="selected" ';
      }  
      echo '<option '.$selected.' value="'.$i.'">'.$i.' vs '.$i.'</option>  ';
    }
}

function random_map($langage){
    include "maplist.php";
    
    if(!isset($maps[$langage])){
        $langage = 'EN_en';
    }
    
    $nb_maps = count($maps[$langage]);
    $random_nb = rand(0,$nb_maps);
    $i=0;
    foreach($maps[$langage] as $map_key => $map_name){
       if($i == $random_nb){
           return $map_key;
       }
       $i++;
       
    }
    
    
}

function cree_select($select_ID, $label_tab, $cookie){
    $option_liste = '<!-- Liste des options pour '. $select_ID . '-->';
//    $label_tab = [0 => "Automatique", 1 => "Manuel"];
    
    foreach($label_tab as $value => $label){
        if($cookie == $value){
            $selected =  ' selected="selected" ';
        }
        $option_liste.= '<option value='.$value.' '. $selected . '>' . $label . '</option>';
        $selected = '';
    }
    
    return $option_liste;
    
}
function cree_liste_income_rate($mode, $cookie){
    
    $expression = new expressions();
    $income_rate_tab = [
        $expression->aucun,
        $expression->tres_faible,
        $expression->faible,
        $expression->moyen,
        $expression->eleve,
        $expression->tres_eleve];
    $liste_income = '';
    $i=0;
    if($mode == 4) {
        foreach ($income_rate_tab as $income_rate) {
            $selected = '';
            if ($cookie == $i) {
                $selected = ' selected="selected" ';
            }
            $liste_income .= '<option ' . $selected . ' value=' . $i . '>' . $income_rate . '</option>';
        $i++;
        
            }
    } else {
        foreach ($income_rate_tab as $income_rate) {
            $selected = '';
            if ($cookie == $i) {
                $selected = ' selected="selected" ';
            }
            $liste_income .= '<option ' . $selected . ' value=' . $i . '>' . $income_rate . '</option>';
       
          $i++;   }
    
     
            }


    echo $liste_income;
}








