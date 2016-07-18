<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        $this->call(FilterTableSeeder::class);
        $this->call(PostTableSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(FormFilterSeeder::class);
    }
}
