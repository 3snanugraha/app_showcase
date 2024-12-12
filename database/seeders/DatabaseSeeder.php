<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Clear tables in correct order
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        \DB::table('app_testers')->truncate();
        \DB::table('app_showcase')->truncate();
        \DB::table('admins')->truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Seed tables in correct order
        $this->call([
            AdminSeeder::class,
            AppShowcaseTableSeeder::class,
            AppTestersTableSeeder::class,
        ]);
    }
}
