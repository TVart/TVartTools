<?php
/**
 * Created by PhpStorm.
 * User: vartan
 * Date: 06/02/15
 * Time: 23:52
 */
use \Illuminate\Database\Eloquent\Model as Eloquent;

class Portails extends  Eloquent{
    public $timestamps = false;
    protected $fillable = [
        "nom_portail",
        "status_portail",
        "type_portail",
        "url_portail",
        "logo_portail"
    ];
    protected $guarded = array('id');

    public function id_utilisateur(){
        return $this->belongsToMany("Utilisateurs");
    }
}