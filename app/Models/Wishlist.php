<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'tab_wishlist';

    // Campos que podem ser preenchidos em operações de criação ou atualização em massa
    protected $fillable = [
        'fk_tab_product',
        'fk_tab_user',
        'qty_product',
        'user_stamp',
    ];

    // Campos que devem ser tratados como datas
    protected $dates = [
        'dt_stamp'
    ];

    // Desabilitar timestamps automáticos do Laravel
    public $timestamps = false;

    // Relacionamento com a tabela 'tab_product'
    public function product()
    {
        return $this->belongsTo(Product::class, 'fk_tab_product', 'id_product');
    }

    // Relacionamento com a tabela 'tab_user'
    public function user()
    {
        return $this->belongsTo(User::class, 'fk_tab_user', 'id_user');
    }
}
