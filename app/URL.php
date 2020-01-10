<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class URL extends Model
{
    protected $fillable = ['route','method','hits'];

    //  naming the model all capital letters so laravel searched for u_r_l_s
    protected $table = 'urls';

    public $timestamps = false;
}
