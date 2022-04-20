<?php

namespace App\Http\Resources;

use App\Models\Level;
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
            "FullName" => $this->full_name,
            "Username" => $this->username,
            "Birthdate" => $this->birthdate,
            "Gender" => $this->gender == "F" ? "Nő" : "Férfi",
            "Email" => $this->email,
            "Password" => $this->password,
            "Role" => $this->role == "user" ? "Felhasználó" : "Admin",
            "ProfilePicture" => $this->profilepicture,
            "Team" => $this->Team->name ?? null,
            "Score" => $this->score,
            "Level" => $this->Level->name ?? null
        ];
    }
}
