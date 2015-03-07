<?php
/**
 * Created by PhpStorm.
 * User: vartan
 * Date: 10/02/15
 * Time: 13:32
 */
use \Illuminate\Database\Eloquent\Model as Eloquent;

class Option_portail extends  Eloquent{
    public $timestamps = false;
    protected $fillable = [
        "id_portail",
        "nom_option_portail", //specific field name for a selected pportail. Ex :Surface
    ];

    protected $guarded = array('id');

    public function id_portail(){
        return $this->belongsTo('Portail', 'id');
    }
}