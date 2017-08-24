    <?php

    class panier {

        public $DB;

        public function __construct($DB) {
            $this->DB = $DB;
        }
        
        /**
         * Collecte tt les ID passés en GET et renvoie leurs enregistrements BD
         * @param int $id paramètre passé en GET 
         * @return array enregistrements associés aux ID
         */
        public function extractId($id) {
            if (isset($_SESSION['panier'])) {
                $_SESSION['panier'] += array($id => 0);
                $_SESSION['panier'][$id] ++;
                foreach ($_SESSION['panier'] as $key => $value) {
                    $tab[] = $key;
                }
                $comma = implode(",", $tab);
                $requete = "SELECT id,price,name FROM products WHERE id IN($comma)";
            } else {
                $_SESSION['panier'] = array($id => 1);
                $requete = "SELECT id,price,name FROM products WHERE id =" . $id;
            }
            $resultat = $this->DB->extract($requete);
            return $resultat;
        }

         /**
         * Renvoie les enregistrements des produits mis en session
         * @param 
         * @return array enregistrements associés aux ID des produits
         */
        public function extractSession() {
            if (isset($_SESSION['panier'])) {
                foreach ($_SESSION['panier'] as $key => $value) {
                    $tab[] = $key;
                }
                $comma = implode(",", $tab);
                $rest = substr($comma, -1);   
                if($rest == ','){
                    $comma = substr($comma,0,-1);
                }
                $requete = "SELECT id,price,name FROM products WHERE id IN($comma)";
                $resultat = $this->DB->extract($requete);
                 return $resultat;
            }
        }
    }
