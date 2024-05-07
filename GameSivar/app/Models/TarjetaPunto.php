<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TarjetaPunto extends Model
{
    use HasFactory;

    protected $table = 'tarjeta_puntos';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = ([
        'id',
        'users_id',
        'tarjeta_juegos_id',
        'cantidadP'
    ]);

    public function tarjeta()
    {
    return $this->belongsTo(TarjetaJuego::class, 'tarjeta_juegos_id');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'users_id');
    }
}
