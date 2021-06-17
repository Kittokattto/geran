<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lokasi extends Model
{
    //
    protected $table = 'lokasi';

    public function user()
    {
       return $this->belongsTo('App\User', 'id_user');
    }

    public function hakmilik()
    {
       return $this->belongsTo('App\Failkes', 'no_hakmilik');
    }
}
