<?php

use Illuminate\Database\Seeder;

class ConfigsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('configs')->delete();

        \DB::table('configs')->insert(array (
            0 =>
            array (
                'id' => 1,
                'config_name' => 'Application Name',
                'key' => 'app_name',
                'value' => 'Cokibase',
                'description' => 'Laravel CRUD + API Generator by Cokilabs',
                'deleted_at' => NULL,
                'created_at' => '2019-01-06 15:32:39',
                'updated_at' => '2019-01-06 16:14:03',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 =>
            array (
                'id' => 2,
                'config_name' => 'Application Icon',
                'key' => 'app_icon',
                'value' => 'app/logo.png',
                'description' => 'Application Logo For Branding',
                'deleted_at' => NULL,
                'created_at' => '2019-01-06 16:14:33',
                'updated_at' => '2019-01-06 16:16:49',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            2 =>
            array (
                'id' => 3,
                'config_name' => 'Application Description',
                'key' => 'app_desc',
                'value' => 'Long Description of the Application',
                'description' => 'Desc Here',
                'deleted_at' => '2019-01-06 16:27:47',
                'created_at' => '2019-01-06 16:24:19',
                'updated_at' => '2019-01-06 16:27:47',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            3 =>
            array (
                'id' => 4,
                'config_name' => 'Application Developer',
                'key' => 'app_developer',
                'value' => 'Cokilabs',
                'description' => 'Application Developer',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 01:53:15',
                'updated_at' => '2019-01-07 01:53:15',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            4 =>
            array (
                'id' => 5,
                'config_name' => 'Application Skin',
                'key' => 'app_skin',
                'value' => 'skin-blue',
                'description' => 'Application Ambiance',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:53:15',
                'updated_at' => '2019-01-07 02:53:15',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));


    }
}
