<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;
use TCG\Voyager\Models\Role;

class PermissionRoleTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::where('name', 'admin')->firstOrFail();

        $permissions = Permission::all();

        $role->permissions()->sync(
            $permissions->pluck('id')->all()
        );

        // TODO: Acceso a un tablero para users y contratistas.. En caso de que muera la API, es un apertura a opciones y configuraciones básicas
        DB::table('permission_role')->insert(
            ['permission_id' => 1, 'role_id' => 2]
        );

        DB::table('permission_role')->insert(
            ['permission_id' => 1, 'role_id' => 3]
        );
    }
}
