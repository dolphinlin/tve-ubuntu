<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
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
            DB::table('posts')->insert([
                'title' => str_random(10),
                'content' => str_random(50),
                'filter' => 1,
                ]);
        }
        
    }
}
