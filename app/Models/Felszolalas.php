<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Felszolalas extends Model
{
    public function napirendi_pont()
    {
        return $this->belongsTo(Napirendi_pont::class);
    }
    public function resztvevo()
    {
        return $this->belongsTo(Resztvevo::class);
    }
}
