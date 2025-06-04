<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Model
{
    use HasFactory;
    protected $table = 'empresas';

    protected $primaryKey = 'nit';

    protected $fillable = [
        'nit',
        'nombre',
        'direccion',
        'telefono',
        'estado'
    ];
}
