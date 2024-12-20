<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_product'=> $this -> id_product,
            'fk_tab_category' => $this->fk_tab_category,
            'fk_tab_promotion'=> $this->fk_tab_promotion,
            'name_product'=> $this->name_product,
            'description_product' => $this->description_product,
            'price_product'=> $this->price_product,
            'img_product'=> base64_encode($this->img_product),
            'dt_stamp'=> $this->dt_stamp,
            'category' => $this->whenLoaded('category', function () {
                return [
                    'id_category' => $this->category->id_category, 
                    'name_category' => $this->category->name_category, 
                ];
            }),
            'promotion' => $this->whenLoaded('promotion', function () {
                return [
                    'id_promotion' => $this->promotion->id_promotion, 
                    'dt_start' => $this->promotion->dt_start,
                    'dt_end' => $this->promotion->dt_end, 
                    'num_percentage' => $this->promotion->num_percentage, 
                ];
            }),
        ];

    }
    
}
