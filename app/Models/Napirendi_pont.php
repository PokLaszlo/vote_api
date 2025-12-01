<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Napirendi_pont extends Model
{
    protected $table = 'napirendi_pont';
    public $timestamps = false;
    public function kozgyules(){
        return $this->belongsTo(Kozgyules::class);
    }
    public function felszolalas(){
        return $this->hasMany(Felszolalas::class);
    }
    public function szavazat(){
        return $this->hasMany(Szavazat::class);
    }
}
