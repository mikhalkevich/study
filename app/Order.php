<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public $fillable = ['name', 'email', 'phone', 'body','user_id', 'status'];
}
