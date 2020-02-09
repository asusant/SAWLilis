<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(LevelsTableSeeder::class);
        $this->call(UserLevelsTableSeeder::class);
        $this->call(PrivilegesTableSeeder::class);
        $this->call(ModulesTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(GroupMenusTableSeeder::class);
        $this->call(LogsTableSeeder::class);
        $this->call(ConfigsTableSeeder::class);
    }
}
