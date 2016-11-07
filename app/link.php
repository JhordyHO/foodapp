<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class link extends Model
{
    protected  $table = "links";


    // relation


    public function category()
    {
        return $this->belongsTo('App\Category','id_category');
    }
}
