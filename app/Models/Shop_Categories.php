<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Shop_Categories extends Model
{
    protected $fillable=['name','img'];
    public function logo(){
        return "../storage/app/".$this->img;
    }
}
