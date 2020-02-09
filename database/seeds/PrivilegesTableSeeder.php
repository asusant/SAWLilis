<?php

use Illuminate\Database\Seeder;

class PrivilegesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('privileges')->delete();
        
        \DB::table('privileges')->insert(array (
            0 => 
            array (
                'id' => 1,
                'level_id' => '1',
                'module_id' => '1',
                'index' => '1',
                'create' => '1',
                'store' => '1',
                'edit' => '1',
                'update' => '1',
                'delete' => '1',
                'custom' => '1',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:03:42',
                'updated_at' => '2019-01-07 02:03:42',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'level_id' => '1',
                'module_id' => '4',
                'index' => '1',
                'create' => '1',
                'store' => '1',
                'edit' => '1',
                'update' => '1',
                'delete' => '1',
                'custom' => '1',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:33:40',
                'updated_at' => '2019-01-07 02:33:40',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'level_id' => '1',
                'module_id' => '3',
                'index' => '1',
                'create' => '1',
                'store' => '1',
                'edit' => '1',
                'update' => '1',
                'delete' => '1',
                'custom' => '1',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:33:59',
                'updated_at' => '2019-01-07 02:33:59',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'level_id' => '1',
                'module_id' => '2',
                'index' => '1',
                'create' => '1',
                'store' => '1',
                'edit' => '1',
                'update' => '1',
                'delete' => '1',
                'custom' => '1',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:34:17',
                'updated_at' => '2019-01-07 02:34:31',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'level_id' => '1',
                'module_id' => '5',
                'index' => '1',
                'create' => '1',
                'store' => '1',
                'edit' => '1',
                'update' => '1',
                'delete' => '1',
                'custom' => '1',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:34:50',
                'updated_at' => '2019-01-07 02:34:50',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'level_id' => '1',
                'module_id' => '6',
                'index' => '1',
                'create' => '1',
                'store' => '1',
                'edit' => '1',
                'update' => '1',
                'delete' => '1',
                'custom' => '1',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:35:12',
                'updated_at' => '2019-01-07 02:35:12',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'level_id' => '1',
                'module_id' => '7',
                'index' => '1',
                'create' => '1',
                'store' => '1',
                'edit' => '1',
                'update' => '1',
                'delete' => '1',
                'custom' => '1',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:37:30',
                'updated_at' => '2019-01-07 02:37:30',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'level_id' => '1',
                'module_id' => '8',
                'index' => '1',
                'create' => '1',
                'store' => '1',
                'edit' => '1',
                'update' => '1',
                'delete' => '1',
                'custom' => '1',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:37:54',
                'updated_at' => '2019-01-07 02:37:54',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'level_id' => '1',
                'module_id' => '9',
                'index' => '1',
                'create' => '1',
                'store' => '1',
                'edit' => '1',
                'update' => '1',
                'delete' => '1',
                'custom' => '1',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:38:14',
                'updated_at' => '2019-01-07 02:38:14',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'level_id' => '2',
                'module_id' => '1',
                'index' => '1',
                'create' => '1',
                'store' => '1',
                'edit' => '1',
                'update' => '1',
                'delete' => '1',
                'custom' => '1',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:38:33',
                'updated_at' => '2019-01-07 02:38:33',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}