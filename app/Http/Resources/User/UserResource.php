<?php

namespace App\Http\Resources\User;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * The "data" wrapper that should be applied.
     *
     * @var string
     */
    public static $wrap = 'user';

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request = null)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'email' => $this->email,
            'email_verified_at' => $this->email_verified_at,
            'status' => $this->status(),
            'role' => $this->role->nama_peranan,
        ];
    }

    /**
     * Custom wrapper function to wrap the array.
     *
     * @return array
     */
    public function withWrap()
    {
        return [
            self::$wrap => $this->toArray()
        ];
    }
}
