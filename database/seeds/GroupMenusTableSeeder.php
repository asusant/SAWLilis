<?php

use Illuminate\Database\Seeder;

class GroupMenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('group_menus')->delete();
        
        \DB::table('group_menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'group_name' => 'Application Configs',
                'icon' => 'fa fa-gears',
                'deleted_at' => NULL,
                'created_at' => '2019-01-06 16:38:48',
                'updated_at' => '2019-01-06 16:38:48',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'group_name' => 'User Menus',
                'icon' => 'fa fa-desktop',
                'deleted_at' => NULL,
                'created_at' => '2019-01-06 16:41:22',
                'updated_at' => '2019-01-06 16:41:22',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}