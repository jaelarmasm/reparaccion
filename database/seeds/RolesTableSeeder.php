<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $role = Role::firstOrNew(['name' => 'admin']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => 'Administrador',
            ])->save();
        }

        $role = Role::firstOrNew(['name' => 'user']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => 'Cliente',
            ])->save();
        }

        $role = Role::firstOrNew(['name' => 'solicitante']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => 'Solicitante',
            ])->save();
        }

        $role = Role::firstOrNew(['name' => 'contratista']);
        if (!$role->exists) {
            $role->fill([
                'display_name' => 'Contratista',
            ])->save();
        }
    }
}
