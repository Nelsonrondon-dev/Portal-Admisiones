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
        // $this->call(UserSeeder::class);

        DB::table('users')->insert([
            'name' => 'Nelson',
            'email' => 'nelsonrondon36@gmail.com',
            'password' => Hash::make('n7e0l1s4'),
        ]);
    }
}
