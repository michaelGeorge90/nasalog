<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Logger extends Model
{
    protected $table = 'logs';

    protected $fillable = ['visitor_id','url_id','time','time_zone','http_version','request_response','size'];

    protected $dates = ['time'];

    public $timestamps = false;
}
