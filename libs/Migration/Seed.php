<?php
/**
 * Created by PhpStorm.
 * User: vartan
 * Date: 07/02/15
 * Time: 11:38
 */

namespace libs\Migration;

class Seed{
    public function feedTables(){
        $this->Utilisateurs();
        $this->Portails();
        //$this->LoginPortail();
    }

    private function Utilisateurs() {
        \Utilisateurs::create([
            "nom_utilisateur"       => "vartan",
            "prenom_utilisateur"    => "",
            "email_utilisateur"     => "vartan@email.com",
            "telephone_utilisateur" => "+33 555 444 333"
        ]);

        \Utilisateurs::create([
            "nom_utilisateur"       => "toto",
            "prenom_utilisateur"    => "",
            "email_utilisateur"     => "toto@email.com",
            "telephone_utilisateur" => "+33 555 444 333"
        ]);
    }

    private function Portails() {
        \Portails::create([
            "nom_portail"  => "SeLoger",
            "type_portail" => "1",
            "url_portail"  => "http://seloger.fr"
        ]);

        \Portails::create([
            "nom_portail"  => "Leboncoin",
            "type_portail" => "2",
            "url_portail"  => "http://leboncoin.fr"
        ]);
    }
}