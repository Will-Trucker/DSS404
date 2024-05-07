<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarjetaJuego extends Model
{
    use HasFactory;

    protected $table = 'tarjeta_juegos';
    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'users_id',
        'codigo',
        'tipo',
        'costo',
        'estado',
        'vencimiento',
        'saldo',
        'limite'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($tarjeta) {
            $tarjeta->codigo = static::generateUniqueCode();
        });
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    public function puntos()
    {
        return $this->hasOne(TarjetaPunto::class, 'tarjeta_juegos_id');
    }

    protected static function generateUniqueCode()
    {
        do {
            $codigo = mt_rand(1000000000000000, 9999999999999999);
        } while (static::where('codigo', $codigo)->exists());

        return $codigo;
    }
}
