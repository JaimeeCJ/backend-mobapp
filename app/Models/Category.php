<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Nome da tabela no banco de dados
    protected $table = 'tab_category';

    // Campos que podem ser preenchidos em operações de criação ou atualização em massa
    protected $fillable = [
        'name_category',
        'user_stamp',
    ];

    // Campos que devem ser tratados como datas
    protected $dates = [
        'dt_stamp'
    ];

    // Desabilitar timestamps automáticos do Laravel
    public $timestamps = false;

    // Relacionamento com a tabela 'tab_product'
    public function products()
    {
        return $this->hasMany(Product::class, 'fk_tab_category', 'id_category');
    }

    // Relacionamento com a tabela 'tab_promotion'
    public function promotions()
    {
        return $this->hasMany(Promotion::class, 'fk_tab_category', 'id_category');
    }
}
