<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $token = $this->createToken($request->device_name)->plainTextToken;
        return [
            'id'    => $this->id,
            'name'  => $this->name,
            'email' => $this->email,
            'token' => $token
        ];
    }
}
