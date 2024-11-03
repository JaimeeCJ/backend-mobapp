<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $table = 'tab_promotion';

    // Campos que podem ser preenchidos em operações de criação ou atualização em massa
    protected $fillable = [
        'fk_tab_category',
        'num_percentage',
        'dt_start',
        'dt_end',
        'user_stamp',
    ];

    // Campos que devem ser tratados como datas
    protected $dates = [
        'dt_start',
        'dt_end',
        'dt_stamp'
    ];

    // Desabilitar timestamps automáticos do Laravel
    public $timestamps = false;

    // Definir o relacionamento com a tabela 'tab_category'
    public function category()
    {
        return $this->belongsTo(TabCategory::class, 'fk_tab_category', 'id_category');
    }
}
