<?php

namespace App\Http\Resources;

use App\Models\Team;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "FullName" => $this->fullname,
            "Username" => $this->username,
            "Email" => $this->email,
            "Password" => $this->password,
            "Role" => $this->role,
            "ProfilePicture" => $this->profilepicture,
            "TeamID" => $this->Team->name,
            "Score" => $this->score,
            "LevelID" => $this->Level->name,
        ];
    }
}
