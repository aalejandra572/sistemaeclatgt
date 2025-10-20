<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permisos = [
            ['name' => 'show-permission', 'code' => 'show-permission'],
            ['name' => 'new-permission', 'code' => 'new-permission'],
            ['name' => 'edit-permission', 'code' => 'edit-permission'],
            ['name' => 'delete-permission', 'code' => 'delete-permission'],
            ['name' => 'show-role', 'code' => 'show-role'],
            ['name' => 'new-role', 'code' => 'new-role'],
            ['name' => 'edit-role', 'code' => 'edit-role'],
            ['name' => 'delete-role', 'code' => 'delete-role'],
            ['name' => 'show-user', 'code' => 'show-user'],
            ['name' => 'new-user', 'code' => 'new-user'],
            ['name' => 'edit-user', 'code' => 'edit-user'],
            ['name' => 'delete-user', 'code' => 'delete-user'],
            ['name' => 'show-proveedor', 'code' => 'show-proveedor'],
            ['name' => 'new-proveedor', 'code' => 'new-proveedor'],
            ['name' => 'edit-proveedor', 'code' => 'edit-proveedor'],
            ['name' => 'delete-proveedor', 'code' => 'delete-proveedor'],
            ['name' => 'show-marca', 'code' => 'show-marca'],
            ['name' => 'new-marca', 'code' => 'new-marca'],
            ['name' => 'edit-marca', 'code' => 'edit-marca'],
            ['name' => 'delete-marca', 'code' => 'delete-marca'],
            ['name' => 'show-categoria', 'code' => 'show-categoria'],
            ['name' => 'new-categoria', 'code' => 'new-categoria'],
            ['name' => 'edit-categoria', 'code' => 'edit-categoria'],
            ['name' => 'delete-categoria', 'code' => 'delete-categoria'],
            ['name' => 'show-cliente', 'code' => 'show-cliente'],
            ['name' => 'new-cliente', 'code' => 'new-cliente'],
            ['name' => 'edit-cliente', 'code' => 'edit-cliente'],
            ['name' => 'delete-cliente', 'code' => 'delete-cliente'],
        ];

        foreach ($permisos as $permiso) {
            $codigo = $permiso['code'];
            $nombre = $permiso['name'];

            Permission::updateOrCreate(
                ['code' => $codigo],
                ['name' => $nombre, 'created_at' => date('Y-m-dTH:i:s'), 'updated_at' => date('Y-m-dTH:i:s')],
            );
        }
    }
}
