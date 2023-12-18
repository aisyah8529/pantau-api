<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Enums\Status;

class Student extends Model
{
    protected $table = 'pelajars';

    public function status()
    {
        return Status::getKey($this->status);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
