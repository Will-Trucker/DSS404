<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $primaryKey = 'idCliente';
    public $timestamps = false;

    // Definición de la relación con el expediente del cliente
    public function expediente()
    {
        return $this->hasOne(ExpedienteCliente::class, 'idCliente');
    }
}
