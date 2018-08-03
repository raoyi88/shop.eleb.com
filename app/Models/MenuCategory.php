<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MenuCategory extends Model
{
    protected $guarded = [];
    public function getname(){
        $this->hasMany(Menu::class,'category_id','id');
    }
}
