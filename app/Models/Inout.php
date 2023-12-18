<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inout extends Model
{
    protected $table = 'keluar_masuks';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function reason()
    {
        return $this->belongsTo(Reason::class, 'tujuan_id');
    }
}
