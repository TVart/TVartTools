<?php
/**
 * Created by PhpStorm.
 * User: vartan
 * Date: 07/11/14
 * Time: 22:19
 */

//namespace libs\Database\Models;
/* Pas de namespace sur les models */

use \Illuminate\Database\Eloquent\Model as Eloquent;

class Utilisateurs extends  Eloquent{
    //public $timestamps = false;
    protected $fillable = [
        "id_utilisateur",
        "nom_utilisateur",
        "prenom_utilisateur",
        "email_utilisateur",
        "telephone_utilisateur",
        "login_utilisateur",
        "password_utilisateur",
        "status_utilisateur"
    ];
    protected $guarded = array('id_utilisateur', 'password_utilisateur');
}