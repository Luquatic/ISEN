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
            'user_id' => 1,
            'username' => 'HSLeiden',
            'password' => bcrypt('Broodjekaas#420'),
        ]);
    }
}
