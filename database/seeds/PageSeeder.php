<?php

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('page_infos')->insert([
            'title' => 'calendar',
            'url' => '',
            ]);
    }
}
