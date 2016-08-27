<?php

use Illuminate\Database\Seeder;

class FilterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('filters')->insert([
        	'subclass' => '其他',
        	]);
    }
}
