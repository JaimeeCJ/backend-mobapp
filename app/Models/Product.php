<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'tab_product';

    // Campos que podem ser preenchidos em operações de criação ou atualização em massa
    protected $fillable = [
        'fk_tab_category',
        'fk_tab_promotion',
        'name_product',
        'price_product',
        'description_product',
        'img_product',
        'user_stamp',
    ];

    // Campos que devem ser tratados como datas
    protected $dates = [
        'dt_stamp'
    ];

    // Desabilitar timestamps automáticos do Laravel
    public $timestamps = false;

    // Relacionamento com a tabela 'tab_category'
    public function category()
    {
        return $this->belongsTo(TabCategory::class, 'fk_tab_category', 'id_category');
    }

    // Relacionamento com a tabela 'tab_promotion'
    public function promotion()
    {
        return $this->belongsTo(TabPromotion::class, 'fk_tab_promotion', 'id_promotion');
    }
}
