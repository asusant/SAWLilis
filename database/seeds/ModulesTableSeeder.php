<?php

use Illuminate\Database\Seeder;

class ModulesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('modules')->delete();
        
        \DB::table('modules')->insert(array (
            0 => 
            array (
                'id' => 1,
                'menu_id' => '2',
                'module' => 'User',
                'route' => 'user',
                'icon' => 'fa fa-users',
                'priority' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 01:12:37',
                'updated_at' => '2019-01-07 01:12:37',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'menu_id' => '1',
                'module' => 'Config',
                'route' => 'config',
                'icon' => 'fa fa-gear',
                'priority' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 01:20:02',
                'updated_at' => '2019-01-07 01:20:02',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'menu_id' => '3',
                'module' => 'Level',
                'route' => 'level',
                'icon' => 'fa fa-gear',
                'priority' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 01:20:48',
                'updated_at' => '2019-01-07 01:20:48',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'menu_id' => '4',
                'module' => 'User Level',
                'route' => 'user-level',
                'icon' => 'fa fa-align-center',
                'priority' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:22:38',
                'updated_at' => '2019-01-07 02:22:38',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'menu_id' => '5',
                'module' => 'Privilege',
                'route' => 'privilege',
                'icon' => 'fa fa-window-close',
                'priority' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:24:27',
                'updated_at' => '2019-01-07 02:24:27',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'menu_id' => '6',
                'module' => 'Module',
                'route' => 'module',
                'icon' => 'fa fa-window-restore',
                'priority' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:25:13',
                'updated_at' => '2019-01-07 02:25:13',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'menu_id' => '7',
                'module' => 'Menu',
                'route' => 'menu',
                'icon' => 'fa fa-dashboard',
                'priority' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:28:15',
                'updated_at' => '2019-01-07 02:28:15',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'menu_id' => '8',
                'module' => 'Group Menu',
                'route' => 'group-menu',
                'icon' => 'fa fa-window-restore',
                'priority' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:29:09',
                'updated_at' => '2019-01-07 02:29:09',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'menu_id' => '9',
                'module' => 'Log',
                'route' => 'log',
                'icon' => 'fa fa-warning',
                'priority' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:32:05',
                'updated_at' => '2019-01-07 02:32:05',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}