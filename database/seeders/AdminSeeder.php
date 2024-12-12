<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    public function run()
    {
        Admin::create([
            'name' => 'Artadev Admin',
            'email' => 'admin@artadev.my.id',
            'password' => Hash::make('admin'),
            'role' => 'admin',
            'is_active' => true
        ]);
    }
}
