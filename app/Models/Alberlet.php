<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alberlet extends Model
{
    protected $table = 'alberlet';
    public $timestamps = false;
    public function tarsashaz()
    {
        return $this->belongsTo(Tarsashaz::class);
    }
    public function tulajdonos()
    {
        return $this->hasMany(Tulajdonos::class);
    }
}
