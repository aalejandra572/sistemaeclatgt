<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    // Nombre de la tabla en PostgreSQL (ajusta si usas otro esquema)
    protected $table = 'sistema.marca'; // cambia a 'marcas' si así se llama en tu BD

    // Clave primaria personalizada
    protected $primaryKey = 'idmarca';
    public $incrementing = true;
    protected $keyType = 'int';

    // Si tu tabla NO tiene created_at/updated_at
    public $timestamps = false; // pon true si existen esas columnas

    // Campos asignables en masa
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    // (Opcional) Casts
    protected $casts = [
        // 'created_at' => 'datetime',
        // 'updated_at' => 'datetime',
    ];

    /**
     * Scope de búsqueda (case-insensitive con PostgreSQL).
     * Uso: Marca::buscar($search)->paginate(10)
     */
    public function scopeBuscar($query, ?string $search)
    {
        if (!$search) return $query;

        return $query->where(function ($q) use ($search) {
            $q->where('nombre', 'ilike', "%{$search}%")
              ->orWhere('descripcion', 'ilike', "%{$search}%");
        });
    }
}
