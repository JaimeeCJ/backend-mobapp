<?php

namespace App\Http\Resources;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PromotionResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id_promotion' => $this->id_promotion,
            'fk_tab_category' => $this->fk_tab_category,    
            'num_percentage' => $this->num_percentage,
            'dt_start' => $this->dt_start->format('Y-m-d H:i:s'), 
            'dt_end' => $this->dt_end ? $this->dt_end->format('Y-m-d H:i:s') : null, 
            'user_stamp' => $this->user_stamp,
            'category' => $this->whenLoaded('category', function () {
                return [
                    'id_category' => $this->category->id_category, 
                    'name_category' => $this->category->name_category, 
                ];
            }),
        ];
    }
}
