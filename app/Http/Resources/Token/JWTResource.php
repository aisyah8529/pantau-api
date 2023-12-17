<?php

namespace App\Http\Resources\Token;

use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;
use Tymon\JWTAuth\Facades\JWTAuth;

class JWTResource extends JsonResource
{   
    /**
     * The variable user
     *
     * @var \App\Models\User
     */
    protected User $user;

    /**
     * Create an instance.
     *
     * @param \App\Models\User $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array
     */
    public function toArray($request)
    {   
        return [
            'accessToken' => JWTAuth::fromUser($this->user),
            'tokenType' => 'bearer',
            'expiresIn' => auth('api')->factory()->getTTL() * 60,
        ];
    }
}
