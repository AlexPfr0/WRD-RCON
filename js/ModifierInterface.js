var ModifierInterface = function () {
    
    
     this.listeMaps = function () {
//        var maps = new Array;
       var maps = {
            'FR_fr': {
                // 1vs1
                "2x3_Esashi": ["Tonnerre Tropical", 1],
                "2x3_Gangjin": ["Combat de Boue", 1],
                "2x3_Hwaseong": ["L'Hiver Nucléaire approche", 1],
                "2x2_port_Wonsan_Terrestre": ["Port de Wonsan", 1],
                "3x3_Muju": ["Vallée Plungjing", 1],
                "2x3_Montagne_1": ["Couloir de la mort", 1],
                "5x3_Marine_1_small_Terrestre": ["Strait to the Point", 1],
                "2x3_Tohoku_Alt": ["Rizière", 1],
                "3x3_Muju_Alt": ["Punchbowl", 1],
                "3x3_Marine_3_Reduite_Terrestre": ["Un Coin d'Enfer", 1],
                "2x2_port_Wonsan": ["Port de Wonsan (nav)", 1],
                "4x4_Marine_6": ["Imprévu (nav)", 1],
                "4x4_Marine_7": ["Impasse à Barents (nav)", 1],
                // 2vs2
                "2x3_Boseong": ["Apocalipse Imminent", 2],
                "2x3_Tohoku": ["Riziere", 2],
                "2x3_Anbyon": ["Hop & Glory", 2],
                "3x2_Montagne_3": ["Réservoir de Chosin", 2],
                "3x2_Taebuko": ["Loi de la Jungle", 2],
                "3x2_Haenam_Alt": ["Opération Chromite", 2],
                "3x3_Highway_Small": ["Autoroute pour Séoul", 2],
                "3x2_Boryeong_Terrestre": ["Diplomatie de la Cannonière", 2],
                "3x3_Marine_3_Terrestre": ["Un autre Jour J au Paradis", 2],
                "5x3_Marine_1_small": ["Strait to the Point (naval)", 2],
                "4x4_Marine_10": ["Alea Jacta Ouest (nav)", 2],
                "4x4_Marine_9": ["Bulldogs et vampires (nav)", 2],
                // 3vs3    
                "3x2_Sangju": ["Dure Jungle", 3],
                "Chongju_Alt": ["Cadavres Exquis", 3],
                "3x2_Taean": ["Bloody Ridge", 3],
                "2x3_Montagne_2": ["Falaise Malaise", 3],
                "3x2_Haenam": ["Retour à Inchon", 3],
                "5x3_Marine_1_Terrestre": ["Détroit au but", 3],
                "3x3_Pyeongtaek_Alt": ["38ème Perpendiculaire", 3],
                "3x3_Highway": ["Autoroute pour Séoul", 3],
                "3x3_Thuringer_Wald": ["Fosse au serpents", 3],
                "3x3_Thuringer_Wald_Alt": ["Carrefours", 3],
                "3x2_Boryeong": ["Diplomatie de la Canonnière (nav)", 3],
                "3x3_Marine_3": ["Un autre Jour J au Paradis (nav)", 3],
                "4x4_Marine_4": ["Atoll en Approche", 3],
                "4x4_Marine_5": ["Waterworld", 3],
                //4vs4
                "4x3_Sangju_Alt": ["La Ligne Verte", 4],
                "5x3_Marine_1_Alt": ["Bataille de la Passe Reppah", 4],
                "3x3_Pyeongtaek": ["38ème Parallèle", 4],
                "3x3_Montagne_4": ["A dédale Nippon", 4],
                "3x3_Chongju": ["Rock en Corée", 4],
                "3x3_Montagne_1": ["Cold War Z", 4],
                "3x3_Gangjin": ["Innondations", 4],
                "4x4_ThreeMileIsland": ["L'Aube de Juche (Three Miles Island long)", 4],
                "4x4_ThreeMileIsland_Alt": ["Fusion Finale (Three Miles Island larg)", 4],
                "5x3_Marine_1": ["Détroit au but (nav)", 4],
                "3x3_Marine_2": ["Smoke in the water (nav)", 4],
                "4x3_Gjoll": ["Crève Coeur", 4],
                "3x3_Asgard": ["Couronne de Combes", 4],
//    10vs10
                "5x3_Asgard_10v10": ["Asgard", 10],
                "5x3_Gjoll_10v10": ["Gjoll", 10],
                "4x4_Russian_Roulette": ["Roulette Russe", 10]
            },
            
            
            'EN_en': {
                // 1vs1
                "2x3_Esashi": ["Tropical Thunder", 1],
                "2x3_Gangjin": ["Mud fight", 1],
                "2x3_Hwaseong": ["Nuclear Winter is coming", 1],
                "2x2_port_Wonsan_Terrestre": ["Wonsan Harbour", 1],
                "3x3_Muju": ["Plunjing Valley", 1],
                "2x3_Montagne_1": ["Death corridor", 1],
                "5x3_Marine_1_small_Terrestre": ["Strait to the Point", 1],
                "2x3_Tohoku_Alt": ["Paddy Field", 1],
                "3x3_Muju_Alt": ["Punchbowl", 1],
                "3x3_Marine_3_Reduite_Terrestre": ["Corner Hell", 1],
                "2x2_port_Wonsan": ["Wonsan Harbour (nav)", 1],
                "4x4_Marine_6": ["Imprévu (nav)", 1],
                "4x4_Marine_7": ["Standoff in Barents (nav)", 1],
                // 2vs2
                "2x3_Boseong": ["Apocalipse Imminent", 2],
                "2x3_Tohoku": ["Paddy Field", 2],
                "2x3_Anbyon": ["Hop & Glory", 2],
                "3x2_Montagne_3": ["Chosin Reservoir", 2],
                "3x2_Taebuko": ["Jungle Law", 2],
                "3x2_Haenam_Alt": ["Chromite Operation", 2],
                "3x3_Highway_Small": ["Highway to Seoul", 2],
                "3x2_Boryeong_Terrestre": ["Gunboat Diplomacy", 2],
                "3x3_Marine_3_Terrestre": ["Another D-Day in Paradise ", 2],
                "5x3_Marine_1_small": ["Strait to the Point (naval)", 2],
                "4x4_Marine_10": ["Alea Jacta Ouest (nav)", 2],
                "4x4_Marine_9": ["Bulldogs and vampires (nav)", 2],
                // 3vs3    
                "3x2_Sangju": ["Tough Jungle", 3],
                "Chongju_Alt": ["Exquisite Corpses", 3],
                "3x2_Taean": ["Bloody Ridge", 3],
                "2x3_Montagne_2": ["Cliff Hanger", 3],
                "3x2_Haenam": ["Back to Inchon", 3],
                "5x3_Marine_1_Terrestre": ["Strait to the Point", 3],
                "3x3_Pyeongtaek_Alt": ["38th Perpendicular", 3],
                "3x3_Highway": ["Highway to Seoul", 3],
                "3x3_Thuringer_Wald": ["Snake Pit", 3],
                "3x3_Thuringer_Wald_Alt": ["Cross Road", 3],
                "3x2_Boryeong": ["Gunboat Diplomacy (nav)", 3],
                "3x3_Marine_3": ["Another D-Day in Paradise (nav)", 3],
                "4x4_Marine_4": ["Atoll is Coming", 3],
                "4x4_Marine_5": ["Waterworld", 3],
                //4vs4
                "4x3_Sangju_Alt": ["Green Line", 4],
                "5x3_Marine_1_Alt": ["Battle of Reppah Pass", 4],
                "3x3_Pyeongtaek": ["38ème Parallel", 4],
                "3x3_Montagne_4": ["Maze in Japan", 4],
                "3x3_Chongju": ["Korean Rocks", 4],
                "3x3_Montagne_1": ["Cold War Z", 4],
                "3x3_Gangjin": ["Floods", 4],
                "4x4_ThreeMileIsland": ["Sun of Juche (Three Miles Island long)", 4],
                "4x4_ThreeMileIsland_Alt": ["Final Meltdown (Three Miles Island larg)", 4],
                "5x3_Marine_1": ["Détroit au but (nav)", 4],
                "3x3_Marine_2": ["Smoke in the water (nav)", 4],
                "4x3_Gjoll": ["Heart-Breaking", 4],
                "3x3_Asgard": ["Crown Combes", 4],
                //    10vs10
                "5x3_Asgard_10v10": ["Asgard", 10],
                "5x3_Gjoll_10v10": ["Gjoll", 10],
                "4x4_Russian_Roulette": ["Russian Roulette", 10]
            }
        };

        return maps;

    };

    this.afficheIncomeRate = function (gamemode, incomerate) {
        var income_value_conquete = [0, 4, 6, 7, 8, 10];
        var income_value_destr_eco = ['0', '-40%', '-20%', '-', '+20%', '+40%'];
        var tab;
        var html = '';
        if (gamemode === '4') {
            tab = income_value_conquete;
            html = ' Pts / 4 sec';
        } else {
            tab = income_value_destr_eco;
        }

        return tab[incomerate] + html;
    };

   

    this.afficherMetaMap = function (map, langage) {
        if ( typeof(this.listeMaps()[langage]) !== "undefined" ) {
            var langage = langage;}
        else{
            langage = 'EN_en';}
        
        var vs = ' ' + this.listeMaps()[langage][map][1] + 'vs' + this.listeMaps()[langage][map][1];
        return this.listeMaps()[langage][map][0] + vs;
    
    };
    
    this.augmenteValeur = function (id_cible,increment){
//        var lenght = increment.lenght;
//        lenght = lenght - 1;
//        var chiffre = document.getElementById(id_cible).value.charAt(0) ;
//        var new_chi = parseInt(chiffre) + 1;
//        for (i=0;i<lenght;i++){
//            new_chi = new_chi + '0';
//        }
        document.getElementById(id_cible).value=parseInt(document.getElementById(id_cible).value) + parseInt(increment);
    };
    this.diminueValeur = function (id_cible,increment){
        document.getElementById(id_cible).value=parseInt(document.getElementById(id_cible).value) - parseInt(increment);
    };
    
   this.active_desactiveBouton = function (id_ref, id_plus, id_moins, min, max){
       
   
        if(document.getElementById(id_ref).value > max){
            document.getElementById(id_plus).disabled = 'true';
        }else{
            document.getElementById(id_plus).disabled = '';
        }
        if(document.getElementById(id_ref).value < min){
            document.getElementById(id_moins).disabled = 'true';
        }else{
            document.getElementById(id_moins).disabled = '';
        }
    };

// Fin de classe    
};

