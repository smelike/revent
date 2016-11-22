<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Connect extends Authenticatable
{
    use Notifiable, SoftDeletes;

    protected $table = 't_connect';
    protected $guarded = [];

    protected $dates = ['deleted_at'];
}
