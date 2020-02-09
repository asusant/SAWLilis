<?php

use Illuminate\Database\Seeder;

class UserLevelsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('user_levels')->delete();
        
        \DB::table('user_levels')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => '1',
                'level_id' => '1',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 00:50:24',
                'updated_at' => '2019-01-07 00:50:24',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => '1',
                'level_id' => '2',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 01:03:00',
                'updated_at' => '2019-01-07 01:03:00',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => '2',
                'level_id' => '2',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:12:23',
                'updated_at' => '2019-01-07 02:12:23',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));
        
        
    }
}