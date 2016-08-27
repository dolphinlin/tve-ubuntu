<?php

use Illuminate\Database\Seeder;

class FormFilterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('form_filters')->insert([
        'title' => '其他',
        ]);
    }
}
