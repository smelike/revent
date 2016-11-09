<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Authenticatable
{
    use Notifiable, SoftDeletes;
    //

    protected $guarded = [];

    protected $table = "t_product";

    protected $dates = ['deleted_at'];

}
