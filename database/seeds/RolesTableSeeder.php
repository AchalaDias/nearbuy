<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'name' => 'Super Admin'
            ],
            [
                'id' => 2,
                'name' => 'Administrator'
            ],
            [
                'id' => 3,
                'name' => 'Vendor'
            ]
        ]);
    }
}
