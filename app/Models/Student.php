<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\Status;
use App\Enums\Gender;

class Student extends Model
{
    protected $table = 'pelajars';

    public function status()
    {
        return Status::getKey($this->status);
    }

    public function inout()
    {
        return $this->hasOne(Inout::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function gender()
    {
        return Gender::getKey($this->jantina);
    }
}
