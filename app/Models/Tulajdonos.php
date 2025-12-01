<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tulajdonos extends Model
{
    protected $table = 'tulajdonos';
    public $timestamps = false;
    public function alberlet(){
        return $this->belongsTo(Alberlet::class);
    }
    public function resztvevo(){
        return $this->hasMany(Resztvevo::class);
    }
}
