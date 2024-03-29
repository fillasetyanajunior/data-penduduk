<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => Hash::make('12345678')
        ]);
        $this->call([
            IndoRegionSeeder::class,
        ]);
    }
}
