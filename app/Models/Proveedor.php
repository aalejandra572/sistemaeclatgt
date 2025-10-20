<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    // Nombre de la tabla en PostgreSQL
    protected $table = 'sistema.proveedor'; // cambia a 'proveedores' si así se llama en tu BD

    // Clave primaria personalizada
    protected $primaryKey = 'idproveedor';
    public $incrementing = true;
    protected $keyType = 'int';

    // Si tu tabla NO tiene created_at/updated_at
    public $timestamps = false; // pon true si existen esas columnas

    // Campos que se pueden asignar en masa
    protected $fillable = [
        'nombre',
        'contacto',
        'telefono',
        'correo',
        'direccion',
    ];

    // (Opcional) Casts si los necesitas
    protected $casts = [
        // 'created_at' => 'datetime',
        // 'updated_at' => 'datetime',
    ];

    /**
     * Scope de búsqueda (case-insensitive con PostgreSQL).
     * Uso: Proveedor::buscar($search)->paginate(10)
     */
    public function scopeBuscar($query, ?string $search)
    {
        if (!$search) return $query;

        return $query->where(function ($q) use ($search) {
            $q->where('nombre', 'ilike', "%{$search}%")
              ->orWhere('contacto', 'ilike', "%{$search}%")
              ->orWhere('correo', 'ilike', "%{$search}%")
              ->orWhere('telefono', 'ilike', "%{$search}%")
              ->orWhere('direccion', 'ilike', "%{$search}%");
        });
    }
}
