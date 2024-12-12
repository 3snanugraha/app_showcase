<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AppTestersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('app_testers')->delete();
        
        \DB::table('app_testers')->insert(array (
            0 => 
            array (
                'id' => 2,
                'name' => 'Trisna Nugraha',
                'email' => 'trisnanugraha87@gmail.com',
                'app_id' => 2,
                'is_mail_sent' => 0,
                'mail_sent_at' => NULL,
                'created_at' => '2024-12-12 18:26:47',
                'updated_at' => '2024-12-12 18:26:47',
            ),
        ));
        
        
    }
}