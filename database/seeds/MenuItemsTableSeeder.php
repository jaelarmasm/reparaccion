<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Menu;
use TCG\Voyager\Models\MenuItem;

class MenuItemsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        $menu = Menu::where('name', 'admin')->firstOrFail();

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Tablero',
            'url'     => '',
            'route'   => 'voyager.dashboard',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-pie-chart',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 1,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Usuarios',
            'url'     => '',
            'route'   => 'voyager.users.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-person',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 6,
            ])->save();
        }

        $toolsMenuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Herramientas',
            'url'     => '',
        ]);
        if (!$toolsMenuItem->exists) {
            $toolsMenuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-tools',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 7,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.roles'),
            'url'     => '',
            'route'   => 'voyager.roles.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-lock',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 1,
            ])->save();
        }

        // estados
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Estados Para Contratos',
            'url'     => '',
            'route'   => 'voyager.estados.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-edit',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 2,
            ])->save();
        }

        // tipo_trabajos
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Tipos De Trabajo',
            'url'     => '',
            'route'   => 'voyager.tipotrabajos.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-brush',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 3,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Multimedia',
            'url'     => '',
            'route'   => 'voyager.media.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-images',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 4,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Base de Datos',
            'url'     => '',
            'route'   => 'voyager.database.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-data',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 5,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.bread'),
            'url'     => '',
            'route'   => 'voyager.bread.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-bread',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 6,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Diseñar Menu',
            'url'     => '',
            'route'   => 'voyager.menus.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-list',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 7,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => __('voyager::seeders.menu_items.compass'),
            'url'     => '',
            'route'   => 'voyager.compass.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-compass',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 8,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Ajustes',
            'url'     => '',
            'route'   => 'voyager.settings.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-settings',
                'color'      => null,
                'parent_id'  => $toolsMenuItem->id,
                'order'      => 9,
            ])->save();
        }
        
        // TODO BREAD 2
        // contratos
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Contratos',
            'url'     => '',
            'route'   => 'voyager.contratos.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-documentation',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 2,
            ])->save();
        }

        // plans
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Planes',
            'url'     => '',
            'route'   => 'voyager.plans.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-credit-card',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 3,
            ])->save();
        }

        // anuncios
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Anuncios',
            'url'     => '',
            'route'   => 'voyager.anuncios.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-megaphone',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 4,
            ])->save();
        }
        
        // contratistas
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Contratistas',
            'url'     => '',
            'route'   => 'voyager.contratistas.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-hammer',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 5,
            ])->save();
        }

        // solicitudes
        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Solicitudes',
            'url'     => '',
            'route'   => 'voyager.solicitudes.index',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => 'voyager-megaphone',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 6,
            ])->save();
        }
    }
}
