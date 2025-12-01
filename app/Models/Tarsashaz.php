<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarsashaz extends Model
{
    protected $table = 'tarsashaz';
    public $timestamps = false;
    public function alberlet(){
        return $this->hasMany(Alberlet::class);
    }
    public function kozgyules(){
        return $this->hasMany(Kozgyules::class);
    }
}
