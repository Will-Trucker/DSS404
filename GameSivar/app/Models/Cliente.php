<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = 'clientes';
    protected $primaryKey = 'id';
   
    public $timestamps = false;

    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'genero',
        'email',
        'telefono',
        'nacimiento'
    ];
}
