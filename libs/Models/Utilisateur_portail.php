<?php
/**
 * Created by PhpStorm.
 * User: vartan
 * Date: 06/02/15
 * Time: 23:56
 */
use \Illuminate\Database\Eloquent\Model as Eloquent;

class Utilisateur_portail extends  Eloquent{
    public $timestamps = false;
    protected $fillable = [
        "id_utilisateur",
        "id_portail",
    ];
    protected $guarded = array('id');

    public function id_utilisateur()
    {
        return $this->belongsToMany('Utilisateurs', 'id');
    }

    public function id_portail()
    {
        return $this->belongsToMany('Portails', 'id');
    }

}