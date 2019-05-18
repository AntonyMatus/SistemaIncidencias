<?php

namespace Laxcore\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Laxcore\Http\Controllers\Controller;
use Illuminate\Support\Collection as Collection;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex(Request $request)
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAgregar()
    {
        $routes = [];
        foreach (\Route::getRoutes()->getIterator() as $route){
            if (strpos($route->uri, 'admin') !== false){
                $r = explode('/', $route->uri);
                $routes[] =  $r[1];
            }
        }
        $routes = array_diff($routes, array('dashboard', 'usuarios', 'roles'));
        $result = Collection::make(array_unique($routes));
        $result->each(function ($item, $key) {
            // crear permisos para cada elemento de colección
            Permission::firstOrCreate(['name' => $item. '.index', 'display_name' => 'Listar '. ucfirst($item)]);
            Permission::firstOrCreate(['name' => $item. '.ver', 'display_name' => 'Ver '. ucfirst($item)]);
            Permission::firstOrCreate(['name' => $item. '.crear', 'display_name' => 'Crear '. ucfirst($item)]);
            Permission::firstOrCreate(['name' => $item. '.editar', 'display_name' => 'Editar '. ucfirst($item)]);
            Permission::firstOrCreate(['name' => $item. '.eliminar', 'display_name' => 'Eliminar '. ucfirst($item)]);
        });

        $permission = Permission::get();
        return view('roles.agregar', compact('permission'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function postAgregar(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);

        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));


        return redirect()->route('roles.index')
            ->with('success', 'Role created successfully');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getVer($id)
    {
        $role = Role::find($id);
        $rolePermissions = Permission::join("role_has_permissions", "role_has_permissions.permission_id", "=", "permissions.id")
            ->where("role_has_permissions.role_id", $id)
            ->get();


        return view('roles.ver', compact('role', 'rolePermissions'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEditar($id)
    {
        $role = Role::find($id);
        $permission = Permission::get();
        $rolePermissions = DB::table("role_has_permissions")->where("role_has_permissions.role_id", $id)
            ->pluck('role_has_permissions.permission_id', 'role_has_permissions.permission_id')
            ->all();


        return view('roles.editar', compact('role', 'permission', 'rolePermissions'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postEditar(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);


        $role = Role::find($id);
        $role->name = $request->input('name');
        $role->save();


        $role->syncPermissions($request->input('permission'));


        return redirect()->route('roles.index')
            ->with('success', 'Role updated successfully');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postEliminar($id)
    {
        DB::table("roles")->where('id', $id)->delete();
        return redirect()->route('roles.index')
            ->with('success', 'Role deleted successfully');
    }
}
