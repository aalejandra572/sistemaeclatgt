<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    // Nombre de la tabla (ajusta el esquema/nombre si aplica)
    protected $table = 'sistema.categoria'; // cambia a 'categoria' o 'categorias' si así está en tu BD

    // Clave primaria personalizada
    protected $primaryKey = 'idcategoria';
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
     * Uso: Categoria::buscar($search)->paginate(10)
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
