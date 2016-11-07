<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interaction extends Model
{
    protected $table="interaction";
    protected $primaryKey ="idInteraction";

    // relacion de belongsTo

    public function usuario()
    {
        return $this->belongsTo('App\User','id_User');
    }
}
