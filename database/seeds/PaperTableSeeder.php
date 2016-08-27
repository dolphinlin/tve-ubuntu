<?php

use Illuminate\Database\Seeder;

class PaperTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i=0; $i < 10; $i++) {
            DB::table('papers')->insert([
                'title' => str_random(10),
                'auth' => 'Dolphin',
                'number' => 'B10223001',
                'year' => 105,
                'teacher' => 1,
                ]);
        }
    }
}
