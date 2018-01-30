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
        DB::table('users')->insert([
            'id' => 1,
            'username' => 'HSLeiden',
            'password' => bcrypt('broodjekaas#420'),
        ]);

        DB::table('users')->insert([
            'id' => 2,
            'username' => 'Kempenaer',
            'password' => bcrypt('Kempenaer#1'),
        ]);
    }
}
