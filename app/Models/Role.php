<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasUuid;
use App\Enums\Status;

class Role extends Model
{
    use HasUuid;

    protected $fillable = [
        'type',
        'description',
        'status',
    ];
  
    public function status()
    {
        return Status::getKey($this->status);
    }
  
    public function user()
    {
        return $this->hasOne(User::class);
    }
}
