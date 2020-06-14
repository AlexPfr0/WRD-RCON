<?php
/// En développement ...
class html_tag{
    
    public function __construct() {
        
    }
    
    public function liste_launchmode() {
    $liste_launchmode = [0 => $expression->automatique, 1 => $expression->manuel];
    return $liste_launchmode;
            
    }
    
    public function cree_select($select_ID, $label_tab, $cookie){
    $option_liste = '<!-- Liste des options pour '. $select_ID . '-->';
    
       
    foreach($label_tab as $value => $label){
        if($cookie == $value){
            $selected =  ' selected="selected" ';
        }
        $option_liste.= '<option value='.$value.' '. $selected . '>' . $label . '</option>';
        $selected = '';
    }
    
    return $option_liste;
    
}
}

