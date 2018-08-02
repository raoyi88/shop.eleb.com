<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class User extends Model
{
    protected $fillable=['name','email','password','status','rememberToken','shop_id'];
}
