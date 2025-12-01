<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Resztvevo extends Model
{
    protected $table = 'resztvevo';
    public $timestamps = false;
    public function felszolalas(){
        return $this->hasMany(Felszolalas::class);
    }
    public function szavazat(){
        return $this->hasMany(Szavazat::class);
    }
    public function tulajdonos(){
        return $this->belongsTo(Tulajdonos::class);
    }
    public function kozgyules(){
        return $this->belongsTo(Kozgyules::class);
    }
    
}
