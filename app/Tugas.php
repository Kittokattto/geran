<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Tugas extends Model 
{
    //
    
   
    protected $table = 'tugas';

    // public function registerby()
    // {
    //    return $this->belongsTo('App\User', 'tugasBy');
    // }

    public function staff()
    {
       return $this->belongsTo('App\User', 'id_user');
    }
    
}
