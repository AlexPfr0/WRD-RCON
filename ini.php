<?php

class reglage {
    
   // Choix du langage (FR_fr, EN_en, DE_de)
    
   public $langage = 'FR_fr';
//     public $langage = 'EN_en';
//   public $langage = 'DE_de';
   
   // Mot de passe pour accéder au site
   // Ce mot de passe évite que n'importe quelle personne ayant des identifiants serveur puisse
   // squater le site pour régler son serveur.
   public $site_mdp = "YourPassWord";
   
   // Point initiaux par joueur
   // Multiplie automatiquement le nombre de joueur par cette variable
   // Les point initiaux sont réglables directement depuis l'interface.
   public $pts_par_joueur = 1000;
   
   // Permet de débloquer les champs de paramètres avancés
   // Par défaut : false => les champs avancés sont en mode disabled="disabled"
   // Activer ces champs n'apporte pas grand chose au paramètrage du serveur
   public $autoriser_super_reglage = false;
   
   // Cette variable représente la version actuelle de l'API
   // Ne pas modifier cette variable, elle permet la notification lorsqu'une nouvelle version est disponible.
   public $APIversion = 0.8;
   

  
}



