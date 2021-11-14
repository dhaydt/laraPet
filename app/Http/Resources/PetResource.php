<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PetResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'id' => $this->id,
            'name' => $this->name,
            'breed' => $this->breed,
            'sex' => $this->sex,
            'age' => $this->age,
            'color' => $this->color,
            'face' => $this->face,
            'side' => $this->side,
            'top' => $this->top,
            'behind' => $this->behind,
            'barcode' => $this->barcode,

            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}