<?php
/**
 * Created by PhpStorm.
 * User: vartan
 * Date: 07/02/15
 * Time: 13:13
 */
use \Illuminate\Database\Eloquent\Model as Eloquent;

class Login_portail extends  Eloquent{
    public $timestamps = false;
    protected $fillable = [
        "id_portail",
        "login_portail",
        "password_portail",
        "email_portail",
        "auth"
    ];
    protected $guarded = array('id');

    public function id_portail()
    {
        return $this->belongsTo('Portails', 'id');
    }
}