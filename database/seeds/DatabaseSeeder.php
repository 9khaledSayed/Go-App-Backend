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
         $this->call([
//         AdminSeeder::class
         ]);

        \App\Provider::create([
            'name' => 'provider',
            'email' => 'provider@example.com',
            'phone' => '01024098963',
            'email_verified_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
        ]);

        \App\User::create([
            'name' => 'user',
            'email' => 'user@example.com',
            'phone' => '01024098963',
            'email_verified_at' => \Carbon\Carbon::now()->format('Y-m-d'),
            'password' => \Illuminate\Support\Facades\Hash::make('12345678'),
        ]);
    }
}
