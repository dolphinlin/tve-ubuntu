<?php

use Illuminate\Database\Seeder;

class RegTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('reg_filters')->insert([
          'title' => '學生',
          ]);
        DB::table('reg_filters')->insert([
          'title' => '教師',
          ]);
    }
}
