<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AdminsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('admins')->delete();
        
        \DB::table('admins')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Artadev Admin',
                'email' => 'admin@artadev.my.id',
                'password' => '$2y$12$jZbb.3iG1QfO5zn72G4FrOzM0Bl8fQBu./xIsQrrJkjRAFEp1mOlq',
                'role' => 'admin',
                'is_active' => 1,
                'remember_token' => NULL,
                'created_at' => '2024-12-12 18:40:10',
                'updated_at' => '2024-12-12 18:40:10',
            ),
        ));
        
        
    }
}