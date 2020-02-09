<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'group_menu_id' => 1,
                'menu' => 'Configs',
                'icon' => 'fa fa-gears',
                'priority' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-01-06 16:53:28',
                'updated_at' => '2019-01-06 16:53:28',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'group_menu_id' => 2,
                'menu' => 'Users',
                'icon' => 'fa fa-users',
                'priority' => 1,
                'deleted_at' => NULL,
                'created_at' => '2019-01-06 17:01:07',
                'updated_at' => '2019-01-06 17:01:07',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'group_menu_id' => 1,
                'menu' => 'Level',
                'icon' => 'fa fa-align-center',
                'priority' => 2,
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 01:19:16',
                'updated_at' => '2019-01-07 01:19:16',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'group_menu_id' => 1,
                'menu' => 'User Level',
                'icon' => 'fa fa-align-center',
                'priority' => 3,
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:04:33',
                'updated_at' => '2019-01-07 02:04:33',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'group_menu_id' => 1,
                'menu' => 'Privilege',
                'icon' => 'fa fa-user-times',
                'priority' => 7,
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:14:23',
                'updated_at' => '2019-01-07 02:17:28',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'group_menu_id' => 1,
                'menu' => 'Module',
                'icon' => 'fa fa-dashboard',
                'priority' => 6,
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:15:42',
                'updated_at' => '2019-01-07 02:16:19',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'group_menu_id' => 1,
                'menu' => 'Menu',
                'icon' => 'fa fa-dashboard',
                'priority' => 5,
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:16:14',
                'updated_at' => '2019-01-07 02:16:14',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'group_menu_id' => 1,
                'menu' => 'Group Menu',
                'icon' => 'fa fa-window-restore',
                'priority' => 4,
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:16:57',
                'updated_at' => '2019-01-07 02:17:06',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'group_menu_id' => 1,
                'menu' => 'Log',
                'icon' => 'fa fa-warning',
                'priority' => 8,
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:19:00',
                'updated_at' => '2019-01-07 02:19:00',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}