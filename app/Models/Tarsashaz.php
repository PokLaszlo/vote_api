<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tarsashaz extends Model
{
    public function alberlet(){
        return $this->hasMany(Alberlet::class);
    }
    public function kozgyules(){
        return $this->hasMany(Kozgyules::class);
    }
}
