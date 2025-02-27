<?php

use Illuminate\Database\Seeder;

class LogsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('logs')->delete();
        
        \DB::table('logs')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'table' => 'users',
                'row_id' => 2,
                'action' => 'store',
                'description' => 'User ID 1 menambah data users dengan ID 2',
                'deleted_at' => NULL,
                'created_at' => '2019-01-06 17:35:09',
                'updated_at' => '2019-01-06 17:35:09',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'table' => 'configs',
                'row_id' => 4,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Config dengan ID = 4 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-06 18:09:04',
                'updated_at' => '2019-01-06 18:09:04',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'table' => 'configs',
                'row_id' => 4,
                'action' => 'store',
                'description' => 'User dengan ID = 1 mengubah data Config dengan ID = 4 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-06 18:10:16',
                'updated_at' => '2019-01-06 18:10:16',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'user_id' => 1,
                'table' => 'configs',
                'row_id' => 5,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Config dengan ID = 5 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-06 18:11:30',
                'updated_at' => '2019-01-06 18:11:30',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'user_id' => 1,
                'table' => 'configs',
                'row_id' => 5,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menghapus data Config dengan ID = 5 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-06 18:11:34',
                'updated_at' => '2019-01-06 18:11:34',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'user_id' => 1,
                'table' => 'configs',
                'row_id' => 6,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Config dengan ID = 6 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-06 18:19:29',
                'updated_at' => '2019-01-06 18:19:29',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            6 => 
            array (
                'id' => 7,
                'user_id' => 1,
                'table' => 'configs',
                'row_id' => 6,
                'action' => 'store',
                'description' => 'User dengan ID = 1 mengubah data Config dengan ID = 6 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-06 23:28:41',
                'updated_at' => '2019-01-06 23:28:41',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            7 => 
            array (
                'id' => 8,
                'user_id' => 1,
                'table' => 'userlevels',
                'row_id' => 1,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data UserLevel dengan ID = 1 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 00:50:24',
                'updated_at' => '2019-01-07 00:50:24',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            8 => 
            array (
                'id' => 9,
                'user_id' => 1,
                'table' => 'userlevels',
                'row_id' => 2,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data UserLevel dengan ID = 2 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 01:03:00',
                'updated_at' => '2019-01-07 01:03:00',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            9 => 
            array (
                'id' => 10,
                'user_id' => 1,
                'table' => 'modules',
                'row_id' => 1,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Module dengan ID = 1 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 01:12:37',
                'updated_at' => '2019-01-07 01:12:37',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            10 => 
            array (
                'id' => 11,
                'user_id' => 1,
                'table' => 'modules',
                'row_id' => 1,
                'action' => 'update',
                'description' => 'User dengan ID = 1 mengubah data Module dengan ID = 1 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 01:15:26',
                'updated_at' => '2019-01-07 01:15:26',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            11 => 
            array (
                'id' => 12,
                'user_id' => 1,
                'table' => 'modules',
                'row_id' => 2,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Module dengan ID = 2 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 01:20:02',
                'updated_at' => '2019-01-07 01:20:02',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            12 => 
            array (
                'id' => 13,
                'user_id' => 1,
                'table' => 'modules',
                'row_id' => 3,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Module dengan ID = 3 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 01:20:48',
                'updated_at' => '2019-01-07 01:20:48',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            13 => 
            array (
                'id' => 14,
                'user_id' => 1,
                'table' => 'configs',
                'row_id' => 7,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Config dengan ID = 7 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 01:53:15',
                'updated_at' => '2019-01-07 01:53:15',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            14 => 
            array (
                'id' => 15,
                'user_id' => 1,
                'table' => 'privileges',
                'row_id' => 1,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Privilege dengan ID = 1 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:03:42',
                'updated_at' => '2019-01-07 02:03:42',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            15 => 
            array (
                'id' => 16,
                'user_id' => 1,
                'table' => 'userlevels',
                'row_id' => 3,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data UserLevel dengan ID = 3 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:12:23',
                'updated_at' => '2019-01-07 02:12:23',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            16 => 
            array (
                'id' => 17,
                'user_id' => 1,
                'table' => 'modules',
                'row_id' => 4,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Module dengan ID = 4 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:22:38',
                'updated_at' => '2019-01-07 02:22:38',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            17 => 
            array (
                'id' => 18,
                'user_id' => 1,
                'table' => 'modules',
                'row_id' => 5,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Module dengan ID = 5 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:24:27',
                'updated_at' => '2019-01-07 02:24:27',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            18 => 
            array (
                'id' => 19,
                'user_id' => 1,
                'table' => 'modules',
                'row_id' => 6,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Module dengan ID = 6 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:25:13',
                'updated_at' => '2019-01-07 02:25:13',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            19 => 
            array (
                'id' => 20,
                'user_id' => 1,
                'table' => 'modules',
                'row_id' => 7,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Module dengan ID = 7 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:28:15',
                'updated_at' => '2019-01-07 02:28:15',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            20 => 
            array (
                'id' => 21,
                'user_id' => 1,
                'table' => 'modules',
                'row_id' => 8,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Module dengan ID = 8 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:29:09',
                'updated_at' => '2019-01-07 02:29:09',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            21 => 
            array (
                'id' => 22,
                'user_id' => 1,
                'table' => 'modules',
                'row_id' => 9,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Module dengan ID = 9 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:32:05',
                'updated_at' => '2019-01-07 02:32:05',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            22 => 
            array (
                'id' => 23,
                'user_id' => 1,
                'table' => 'privileges',
                'row_id' => 2,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Privilege dengan ID = 2 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:33:40',
                'updated_at' => '2019-01-07 02:33:40',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            23 => 
            array (
                'id' => 24,
                'user_id' => 1,
                'table' => 'privileges',
                'row_id' => 3,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Privilege dengan ID = 3 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:33:59',
                'updated_at' => '2019-01-07 02:33:59',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            24 => 
            array (
                'id' => 25,
                'user_id' => 1,
                'table' => 'privileges',
                'row_id' => 4,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Privilege dengan ID = 4 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:34:17',
                'updated_at' => '2019-01-07 02:34:17',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            25 => 
            array (
                'id' => 26,
                'user_id' => 1,
                'table' => 'privileges',
                'row_id' => 4,
                'action' => 'update',
                'description' => 'User dengan ID = 1 mengubah data Privilege dengan ID = 4 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:34:31',
                'updated_at' => '2019-01-07 02:34:31',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            26 => 
            array (
                'id' => 27,
                'user_id' => 1,
                'table' => 'privileges',
                'row_id' => 5,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Privilege dengan ID = 5 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:34:50',
                'updated_at' => '2019-01-07 02:34:50',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            27 => 
            array (
                'id' => 28,
                'user_id' => 1,
                'table' => 'privileges',
                'row_id' => 6,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Privilege dengan ID = 6 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:35:12',
                'updated_at' => '2019-01-07 02:35:12',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            28 => 
            array (
                'id' => 29,
                'user_id' => 1,
                'table' => 'privileges',
                'row_id' => 7,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Privilege dengan ID = 7 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:37:30',
                'updated_at' => '2019-01-07 02:37:30',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            29 => 
            array (
                'id' => 30,
                'user_id' => 1,
                'table' => 'privileges',
                'row_id' => 8,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Privilege dengan ID = 8 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:37:54',
                'updated_at' => '2019-01-07 02:37:54',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            30 => 
            array (
                'id' => 31,
                'user_id' => 1,
                'table' => 'privileges',
                'row_id' => 9,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Privilege dengan ID = 9 via Web',
                'deleted_at' => NULL,
                'created_at' => '2019-01-07 02:38:14',
                'updated_at' => '2019-01-07 02:38:14',
                'created_by' => NULL,
                'updated_by' => NULL,
                'deleted_by' => NULL,
            ),
            31 => 
            array (
                'id' => 32,
                'user_id' => 1,
                'table' => 'privileges',
                'row_id' => 10,
                'action' => 'store',
                'description' => 'User dengan ID = 1 menambah data Privilege dengan ID = 10 via Web',
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