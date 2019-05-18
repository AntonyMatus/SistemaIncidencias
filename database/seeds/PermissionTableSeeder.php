<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

       $permissions = [
           'usuarios.index',
           'usuario.ver',
           'usuarios.crear',
           'usuarios.editar',
           'usuarios.eliminar',
           'roles.index',
           'roles.ver',
           'roles.crear',
           'roles.editar',
           'roles.eliminar',
        ];

       $permissionsName = [
           'Listar Usuarios',
           'Ver Usuario',
           'Crear Usuarios',
           'Editar Usuarios',
           'Eliminar Usuario',
           'Listar Roles',
           'Ver Rol',
           'Crear Roles',
           'Editar Roles',
           'Eliminar Rol',
        ];


        foreach ($permissions as $index => $permission) {
            Permission::create(['name' => $permission, 'display_name' => $permissionsName[$index]]);
        }

        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());

        // Creación del usuario
        $user = Xhunter\Models\User::create([
            'name' => 'fister',
            'email' => 'admin@dev.net',
            'password' => bcrypt('secret')
        ]);

        // Asignación del rol
        $user->assignRole($role);
    }
}
