<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (
            0 =>
            array (
                'id' => 1,
                'username' => 'anbiya',
                'name' => 'Anbiya',
                'email' => 'anbiya@students.unnes.ac.id',
                'email_verified_at' => NULL,
                'password' => '$2y$10$cfu0AopF/5VKGN90m5dgA.42i6cxTgaCfEq6eX8S5eJHlgWuxepIa',
                'remember_token' => NULL,
                'created_at' => '2019-01-07 01:11:58',
                'updated_at' => '2019-01-07 01:11:58',
                'deleted_at' => NULL,
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
        ));


    }
}
