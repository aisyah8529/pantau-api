<?php

namespace App\Http\Resources\User;

use App\Http\Resources\Token\JWTResource;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Resources\Json\JsonResource;

class CredentialResource extends JsonResource
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
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            $this->mergeWhen($this->user, new JWTResource($this->user)),
            $this->mergeWhen($this->user, (new UserResource($this->user))->withWrap()),
        ];
    }
}
