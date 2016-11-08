<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Type extends Authenticatable
{
    //
    use Notifiable, SoftDeletes;

    protected $fillable = ['type'];

    protected $table = 't_type';

    protected $dates = ['deleted_at'];

}
