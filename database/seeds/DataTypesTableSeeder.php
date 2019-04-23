<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class DataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'users');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'users',
                'display_name_singular' => 'Usuario',
                'display_name_plural'   => 'Usuarios',
                'icon'                  => 'voyager-person',
                'model_name'            => 'TCG\\Voyager\\Models\\User',
                'policy_name'           => 'TCG\\Voyager\\Policies\\UserPolicy',
                'controller'            => 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'menus');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'menus',
                'display_name_singular' => __('voyager::seeders.data_types.menu.singular'),
                'display_name_plural'   => __('voyager::seeders.data_types.menu.plural'),
                'icon'                  => 'voyager-list',
                'model_name'            => 'TCG\\Voyager\\Models\\Menu',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        $dataType = $this->dataType('slug', 'roles');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'roles',
                'display_name_singular' => __('voyager::seeders.data_types.role.singular'),
                'display_name_plural'   => __('voyager::seeders.data_types.role.plural'),
                'icon'                  => 'voyager-lock',
                'model_name'            => 'TCG\\Voyager\\Models\\Role',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        // TODO BREAD 1
        // plans
        $dataType = $this->dataType('slug', 'plans');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'plans',
                'display_name_singular' => 'Plan',
                'display_name_plural'   => 'Planes',
                'icon'                  => 'voyager-credit-card',
                'model_name'            => 'App\\Plan',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        // estados
        $dataType = $this->dataType('slug', 'estados');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'estados',
                'display_name_singular' => 'Estado Para Contrato',
                'display_name_plural'   => 'Estados Para Contratos',
                'icon'                  => 'voyager-edit',
                'model_name'            => 'App\\Estado',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        // tipo_trabajos
        $dataType = $this->dataType('slug', 'tipotrabajos');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'tipotrabajos',
                'display_name_singular' => 'Tipo De Trabajo',
                'display_name_plural'   => 'Tipos De Trabajo',
                'icon'                  => 'voyager-brush',
                'model_name'            => 'App\\Tipotrabajo',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        // contratistas
        $dataType = $this->dataType('slug', 'contratistas');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'contratistas',
                'display_name_singular' => 'Contratista',
                'display_name_plural'   => 'Contratistas',
                'icon'                  => 'voyager-hammer',
                'model_name'            => 'App\\Contratista',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        // contratos
        $dataType = $this->dataType('slug', 'contratos');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'contratos',
                'display_name_singular' => 'Contrato',
                'display_name_plural'   => 'Contratos',
                'icon'                  => 'voyager-documentation',
                'model_name'            => 'App\\Contrato',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }

        // anuncios
        $dataType = $this->dataType('slug', 'anuncios');
        if (!$dataType->exists) {
            $dataType->fill([
                'name'                  => 'anuncios',
                'display_name_singular' => 'Anuncio',
                'display_name_plural'   => 'Anuncios',
                'icon'                  => 'voyager-megaphone',
                'model_name'            => 'App\\Anuncio',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => '',
            ])->save();
        }
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
