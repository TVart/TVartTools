<?php
/**
 * Created by PhpStorm.
 * User: vartan
 * Date: 07/02/15
 * Time: 13:22
 */
use \Illuminate\Database\Eloquent\Model as Eloquent;

class Option_utilisateur_portail extends  Eloquent{
    public $timestamps = false;
    protected $fillable = [
        "id_utilisateur_portail",
        "id_option_portail", //specific field name for a selected pportail. Ex :Surface
        "valeur_option_utilisateur_portail", //750 000
    ];
    protected $guarded = array('id');

    public function id_utilisateur_portail()
    {
        return $this->belongsToMany('Utilisateur_portail', 'id');
    }

    public function id_option_portail(){
        return $this->belongsTo('Option_portail', 'id');
    }
}