<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    protected $table = 'tab_review';

    // Campos que podem ser preenchidos em operações de criação ou atualização em massa
    protected $fillable = [
        'fk_tab_user',
        'fk_tab_product',
        'comment_review',
        'rating_review',
        'user_stamp',
    ];

    // Campos que devem ser tratados como datas
    protected $dates = [
        'dt_stamp'
    ];

    // Desabilitar timestamps automáticos do Laravel
    public $timestamps = false;

    // Relacionamento com a tabela 'tab_user'
    public function user()
    {
        return $this->belongsTo(TabUser::class, 'fk_tab_user', 'id_user');
    }

    // Relacionamento com a tabela 'tab_product'
    public function product()
    {
        return $this->belongsTo(TabProduct::class, 'fk_tab_product', 'id_product');
    }
}
