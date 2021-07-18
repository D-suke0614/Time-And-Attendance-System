<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'SeedTech運営',
                'email' => 'SeedTech@gmail.com',
                'password' => bcrypt('st210601'),
                'role' => 1,
            ]
        ]);
    }
}
