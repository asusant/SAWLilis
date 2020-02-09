<?php

use Illuminate\Database\Seeder;

class LevelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('levels')->delete();
        
        \DB::table('levels')->insert(array (
            0 => 
            array (
                'id' => 1,
                'level' => 'Root',
                'icon' => 'fa fa-user-md',
                'description' => 'Root User Role',
                'deleted_at' => NULL,
                'created_at' => '2019-01-06 17:13:47',
                'updated_at' => '2019-01-06 17:13:47',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'level' => 'Admin',
                'icon' => 'fa fa-user-circle-o',
                'description' => 'Program Administrator',
                'deleted_at' => NULL,
                'created_at' => '2019-01-06 17:14:32',
                'updated_at' => '2019-01-06 17:14:32',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}