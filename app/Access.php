<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Access extends Model
{
    //

    protected $table = 'access';

    public function user()
    {
       return $this->belongsTo('App\User', 'id_user');
    }

    public function file()
    {
       return $this->belongsTo('App\Failkes', 'id_file');
    }
}
