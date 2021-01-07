<?php

namespace App\Http\Resources\Admin;

use App\Models\Tool;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            "id"    => $this->id,
            "body"  => $this->body,
            "cycle" => $this->cycle,
            "tool"  => ToolResource::make($this->tool),
        ];
    }
}
