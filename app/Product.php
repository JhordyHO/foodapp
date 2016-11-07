<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected  $table = "product";
    protected  $fillable = ['nombre_producto','descripcion','imagen1','imagen2','imagen3','imagen4','precio','destacado','estado','id_category','id_post'];
    // relation


    public function category()
    {
        return $this->belongsTo('App\Category','id_category');
    }
    public function post()
    {
        return $this->belongsTo('App\Post','id_post');
    }
}
