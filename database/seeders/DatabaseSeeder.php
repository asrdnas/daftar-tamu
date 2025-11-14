<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Imports\TamuImport;
use Maatwebsite\Excel\Facades\Excel;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        Admin::create([
            'username' => 'Admin1',
            'name' => 'Administrator 1',
            'email' => 'admin1@example.com',
            'password' => Hash::make('123123'),
        ]);
        Admin::create([
            'username' => 'Admin2',
            'name' => 'Administrator 2',
            'email' => 'admin2@example.com',
            'password' => Hash::make('123123'),
        ]);
        Admin::create([
            'username' => 'Admin3',
            'name' => 'Administrator 3',
            'email' => 'admin3@example.com',
            'password' => Hash::make('123123'),
        ]);

        Excel::import(new TamuImport, database_path('seeders/data/daftar_tamu.xlsx'));
    }
}
