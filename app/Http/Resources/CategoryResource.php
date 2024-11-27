<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_category' => $this->id_category,
            'name_category' => $this->name_category,
            'product' => [
                'id_product' => $this->id_product,
                'name_product' => $this->name_product,
                'img_product' => $this->img_product ? base64_encode($this->img_product) : null,
            ]
        ];
    }
}
