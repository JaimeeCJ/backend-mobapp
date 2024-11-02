<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory, Notifiable;

    // Definindo a tabela associada a esse model
    protected $table = 'tab_user';

    // Definindo a chave primária
    protected $primaryKey = 'id_user';

    // Permitir que o Eloquent manipule o campo de timestamp `dt_stamp`
    public $timestamps = false; // Caso você não queira que o Laravel gerencie created_at e updated_at automaticamente

    // Definindo os campos que podem ser preenchidos em massa
    protected $fillable = [
        'name_user', 
        'email_user', 
        'password_user',
        'user_stamp',
    ];

    // Definindo os campos que devem ser convertidos para tipos nativos
    protected $casts = [
        'dt_stamp' => 'datetime',
    ];

    // Definindo a formatação da senha como 'hashed' ao ser salva
    public function setPasswordUserAttribute($value)
    {
        $this->attributes['password_user'] = bcrypt($value);
    }
}

