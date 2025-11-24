<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kozgyules extends Model
{
    public function tarsashaz()
    {
        return $this->belongsTo(Tarsashaz::class);
    }

    public function resztvevo(){
        return $this->hasMany(Resztvevo::class);
    }
    public function napirendi_pont(){
        return $this->hasMany(Napirendi_pont::class);
    }
}
