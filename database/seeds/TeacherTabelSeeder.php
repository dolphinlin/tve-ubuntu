<?php

use Illuminate\Database\Seeder;

class TeacherTabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 10; $i++) { 
            DB::table('teachers')->insert([
                'name' => str_random(5),
                'title' => str_random(10),
                'position' => str_random(10),
				'edulevel' => str_random(10),
				'office' => str_random(5),
				'communication' => str_random(10),
				'email' => str_random(10),
				'expertise' => str_random(10),
				'tecwri' => str_random(10),
				'pic' => str_random(5),
				'sort' => $i + 1
                ]);
        }
    }
}
