<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;
use Tymon\JWTAuth\Contracts\JWTSubject;

use App\Traits\HasUuid;
use App\Enums\Status;

class User extends Model implements JWTSubject, AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;
    use HasUuid;

    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'peranan_id',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function student()
    {
        return $this->hasOne(Student::class);
    }

    public function inout()
    {
        return $this->hasOne(Inout::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'peranan_id');
    }

    public function status()
    {
        return Status::getKey($this->status);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
