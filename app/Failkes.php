<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Failkes extends Model
{
    //
    protected $fillable = [
        'gambar_lot'
    ];
    protected $table = 'geran';

    public function registerby()
    {
       return $this->belongsTo('App\User', 'registerBy');
    }

    protected $primaryKey = 'geran_id';
}
