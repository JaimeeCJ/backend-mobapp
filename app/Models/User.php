<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;

    protected $table = 'tab_user';
    protected $primaryKey = 'id_user';
    // Campos que podem ser preenchidos em operações de criação ou atualização em massa
    protected $fillable = [
        'name_user',
        'email_user',
        'password_user',
        'user_stamp',
    ];

    // Campos que devem ser tratados como datas
    protected $dates = [
        'dt_stamp'
    ];

    // Desabilitar timestamps automáticos do Laravel
    public $timestamps = false;

    // Relacionamento com a tabela 'tab_review'
    public function reviews()
    {
        return $this->hasMany(Review::class, 'fk_tab_user', 'id_user');
    }
}
