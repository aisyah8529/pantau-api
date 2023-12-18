<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reason extends Model
{
    protected $table = 'tujuans';

    public function inout()
    {
        return $this->hasOne(Inout::class);
    }
}
