<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    // Nombre de la tabla (ajusta si tu BD usa otro esquema)
    protected $table = 'sistema.cliente'; // si usas esquema sería 'sistema.cliente'

    // Clave primaria personalizada
    protected $primaryKey = 'idcliente';
    public $incrementing = true;
    protected $keyType = 'int';

    // Si tu tabla NO tiene created_at/updated_at
    public $timestamps = false; // pon true si tienes esas columnas

    // Campos asignables en masa
    protected $fillable = [
        'nombre',
        'apellido',
        'telefono',
        'direccion',
    ];

    // (Opcional) Casts
    protected $casts = [
        // 'created_at' => 'datetime',
        // 'updated_at' => 'datetime',
    ];

    /**
     * Scope de búsqueda (case-insensitive con PostgreSQL o LIKE normal para MySQL).
     * Uso: Cliente::buscar($search)->paginate(10)
     */
    public function scopeBuscar($query, ?string $search)
    {
        if (!$search) return $query;

        return $query->where(function ($q) use ($search) {
            $q->where('nombre', 'like', "%{$search}%")
              ->orWhere('apellido', 'like', "%{$search}%")
              ->orWhere('telefono', 'like', "%{$search}%")
              ->orWhere('direccion', 'like', "%{$search}%");
        });
    }
}
