<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'id' => 1,
            'name' => '== Root ==',
            'parent' => 0,
            'image_path' => 'pppp',
            'status' => 0,
            'user_id' => 1
        ]);
    }
}
