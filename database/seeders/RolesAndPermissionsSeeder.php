<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Permisos para la gestion de postulados
        $this->createPermission('crear postulados');
        $this->createPermission('ver postulados');
        $this->createPermission('visualizar perfiles');
        $this->createPermission('editar postulados');
        $this->createPermission('eliminar postulados');

        // Permisos para la gestion de entes
        $this->createPermission('crear entes');
        $this->createPermission('ver entes');
        $this->createPermission('editar entes');
        $this->createPermission('eliminar entes');

        // Permisos para la gestion de usuarios
        $this->createPermission('crear usuarios');
        $this->createPermission('ver usuarios');
        $this->createPermission('visualizar perfil de usuario');
        $this->createPermission('editar usuario');
        $this->createPermission('eliminar usuario');
        $this->createPermission('cambiar contraseña');

        // Permisos de los reportes
        $this->createPermission('ver reportes');
        $this->createPermission('descargar reportes');
        $this->createPermission('ver revisiones');
        $this->createPermission('descargar revisiones');

        // Creacion de roles

        // Rol del personal de ingresos (Permisos necesarios para la funcion del sigpe)
        $role = Role::create(['name' => 'Ingresos']);
        $role->givePermissionTo([
            'crear postulados',
            'ver postulados',
            'visualizar perfiles',
            'editar postulados',
            'cambiar contraseña',
            'ver reportes',
            'descargar reportes',
            'descargar revisiones',
            'crear entes',
            'ver entes'
        ]);

        // Rol del personal de sistemas (Permisos para la gestion de usuarios y eliminacion de entes y postulados)
        $role = Role::create(['name' => 'Sistemas']);
        $role->givePermissionTo([
            'crear usuarios',
            'ver usuarios',
            'editar usuario',
            'eliminar usuario',
            'eliminar postulados',
            'editar entes',
            'eliminar entes'
        ]);

        // Rol Administrador (Todos los permisos, gestion de postulados, gestion de usuarios y auditoria)
        $role = Role::create(['name' => 'Administrador']);
        $role->givePermissionTo(Permission::all());
    }

    /**
     * Create a permission if it does not already exist.
     *
     * @param string $name
     */
    private function createPermission($name)
    {
        if (Permission::where('name', $name)->doesntExist()) {
            Permission::create(['name' => $name]);
        }
    }
}
