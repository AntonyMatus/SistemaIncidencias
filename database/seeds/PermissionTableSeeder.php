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
        //permisos para el rol Super Administrador
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
        //permisos para el Rol Emergencias
       
       
        $role2 = Role::create(['name' => 'Jefe de Área']);
       
        //permisos para el Rol de  Bomberos
        
        $role3 = Role::create(['name' => 'Departamento de Bomberos']);
        
        
        // Creación del usuario
        $user = Xhunter\Models\User::create([
            'name' => 'Antony ',
            'last_name' => 'Rebolledo',
            'username' => 'TigreToño',
            'avatar' => '',
            'email' => 'admin@dev.net',
            'password' => bcrypt('secret')
        ]);

        $user2 = Xhunter\Models\User::create([
            'name' => 'Mario Alberto',
            'last_name' => 'Elizalde',
            'username' => 'Mario',
            'avatar' => '',
            'email' => 'mario_alberto@dev.net',
            'password' => bcrypt('secret2')
        ]);
            // Rol de la estacion de bomberos
        $user3 = Xhunter\Models\User::create([
            'name' => 'Justo Roger',
            'last_name' => 'Ancona',
            'username' => 'Comandante',
            'avatar' => '',
            'email' => 'comandante_bomberos@dev.net',
            'password' => bcrypt('secret3')
        ]);

        // Asignación del roles
        $user->assignRole($role);
        $user2->assignRole($role2);
        $user3->assignRole($role3);

    }
}
