<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Departament extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return[
            'departament_id' => $this->departament_id,
            'departament' => $this->departament,
            'created_at' => $this->created_at,
            'updated_at' => $this->update_at,
        ];
    }
}
