<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            "ID" => $this->id,
            "Name" => $this->name,
            "Description" => $this->description,
            "Score" => $this->score,
            "Level" => $this->Level->name,
            "Image" => $this->image,
            "Base64" => base64_encode(file_get_contents(public_path($this->image)))
        ];
    }
}
