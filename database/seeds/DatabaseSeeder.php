<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
        [
           'email' => 'test@test.com',
           'phone' => '+77085943448',
           'password' => bcrypt('password'),
           'name' => 'Test',
        ],

     ]);
    }
}
