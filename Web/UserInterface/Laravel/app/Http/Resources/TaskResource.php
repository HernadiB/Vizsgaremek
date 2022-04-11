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
          "ID" => $this->name,
          "Name" => $this->name,
          "Descrition" => $this->description,
          "Score" => $this->score,
          "LevelID" => $this->Level->name,
        ];
    }
}
