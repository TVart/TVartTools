<?php

namespace libs\Migration;

use Illuminate\Database\Schema\Blueprint;
use libs\Database\Connection;

class Migrate {
    public function createTables(){

        $this->delete("option_utilisateur_portail");
        $this->delete("option_portail");
        $this->delete("login_portail");
        $this->delete("utilisateur_portail");
        $this->delete("portails");
        $this->delete("utilisateurs");

        $this->Utilisateur();
        $this->Portail();
        $this->UtilisateurPortail();
        $this->LoginPortail();
        $this->OptionPortail();
        $this->OptionUtilisateurPortail();
    }

    public function delete($table){
        Connection::schema()->dropIfExists($table);
    }

    private function Utilisateur(){
        Connection::schema()->create("utilisateurs", function(Blueprint $table){
            $table->increments("id");
            $table->string("login_utilisateur")->index();
            $table->string("password_utilisateur")->index();
            $table->string("nom_utilisateur")->index();
            $table->string("prenom_utilisateur");
            $table->string("email_utilisateur")->unique()->index();
            $table->string("telephone_utilisateur");
            $table->string("adresse_utilisateur")->nullable();
            $table->string("ville_utilisateur")->nullable();
            $table->string("code_postal_utilisateur")->nullable();
            $table->string("pays_utilisateur")->nullable();
            $table->boolean("status_utilisateur")->default(1);
            $table->boolean("is_premium")->defaul(0);
            $table->timestamps();
        });
    }

    private function Portail(){
        Connection::schema()->create("portails", function( Blueprint $table){
            $table->increments("id");
            $table->string("nom_portail")->unique();
            $table->boolean("status_portail")->default(1);
            $table->integer("type_portail");
            $table->string("url_portail");
            $table->boolean("is_premium")->default(false);
        });
    }

    private function UtilisateurPortail() {
        Connection::schema()->create("utilisateur_portail", function (Blueprint $table) {
            $table->increments("id");
            $table->integer("id_utilisateur")->unsigned();
            $table->foreign("id_utilisateur")->references("id")->on("utilisateurs");
            $table->integer("id_portail")->unsigned();
            $table->foreign("id_portail")->references("id")->on("portails");
        });
    }

    private function LoginPortail() {
        Connection::schema()->create("login_portail", function (Blueprint $table) {
            $table->increments("id");
            $table->integer("id_portail")->unsigned();
            $table->foreign("id_portail")->references("id")->on("portails");
            $table->string("login_portail");
            $table->string("password_portail");
            $table->string("email_portail");
            $table->string("auth")->nullable();;
        });
    }

    private function OptionPortail() {
        Connection::schema()->create("option_portail", function (Blueprint $table) {
            $table->increments("id");
            $table->string("nom_option_portail");
            $table->integer("id_portail")->unsigned();
            $table->foreign("id_portail")->references("id")->on("portails");
        });
    }

    private function OptionUtilisateurPortail() {
        Connection::schema()->create("option_utilisateur_portail", function (Blueprint $table) {
            $table->increments("id");
            $table->string("valeur_option_utilisateur_portail");
            $table->integer("id_utilisateur_portail")->unsigned();
            $table->foreign("id_utilisateur_portail")->references("id")->on("utilisateur_portail");
            $table->integer("id_option_portail")->unsigned();
            $table->foreign("id_option_portail")->references("id")->on("option_portail");
        });
    }
}