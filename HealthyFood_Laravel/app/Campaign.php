<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    //
    protected $table = "products";
    protected $fillable = [
        "image",
        "description",
        "category_id",
    ];

    public  function Category(){
       return $this->belongsTo(Category::class,"category_id");
    }
}
