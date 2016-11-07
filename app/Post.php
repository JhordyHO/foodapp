<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";
    protected  $fillable = ['portada','titulo','descripcion','id_User'];
// relation
    public function user()
    {
        return $this->belongsTo('App/User','id_User');
    }
}
