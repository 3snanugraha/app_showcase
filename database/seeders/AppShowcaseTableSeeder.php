<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class AppShowcaseTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('app_showcase')->delete();
        
        \DB::table('app_showcase')->insert(array (
            0 => 
            array (
                'id' => 1,
                'app_name' => 'Chordpedia',
                'app_description' => 'Bahasa default - id
• 🔍 Pencarian dan Acak Chord Super Cepat
• 📚 2400+ Chord Lagu Indonesia & Internasional
• 🎼 Transpose & Auto Scroll Canggih 
• 👀 Interface Bersih & Nyaman
• ⚡ Performa Optimal & Ringan
• ❤️ Simpan Chord Favorit

Chordpedia - Bikin main gitarmu makin asyik! 🎸✨',
                'app_banner' => 'storage/app-banners/chordpedia-banner.png',
            'app_screenshots' => '["storage\\/app-screenshots\\/chordpedia-screen (1).jpg","storage\\/app-screenshots\\/chordpedia-screen (2).jpg","storage\\/app-screenshots\\/chordpedia-screen (3).jpg","storage\\/app-screenshots\\/chordpedia-screen (4).jpg","storage\\/app-screenshots\\/chordpedia-screen (5).jpg","storage\\/app-screenshots\\/chordpedia-screen (6).jpg","storage\\/app-screenshots\\/chordpedia-screen (7).jpg","storage\\/app-screenshots\\/chordpedia-screen (8).jpg","storage\\/app-screenshots\\/chordpedia-screen (9).jpg"]',
                'app_version' => '1.0.0',
                'app_package_name' => 'com.artadev.chordpedia',
                'app_download_link' => 'https://drive.google.com/file/d/19YOThgJFgLrg8XMd3Z0fS1GursvLrueb/view?usp=sharing',
                'internal_test_link' => 'https://play.google.com/apps/internaltest/4700989403602061953',
                'app_min_android_version' => '10',
                'app_size' => '15.00',
                'is_active' => 1,
                'created_at' => '2024-12-12 17:57:15',
                'updated_at' => '2024-12-12 18:28:15',
                'deleted_at' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'app_name' => 'Islamku: Al-Qur\'an & Panduan',
            'app_description' => 'Catatan Rilis - Islamku: Panduan Ibadah Digital (Versi 1.0)

✨ Fitur Lengkap & Gratis:

- Al-Qur\'an digital dengan audio, terjemahan & tafsir
- Jadwal shalat otomatis dengan notifikasi adzan
- Arah kiblat dengan kompas digital
- Kumpulan doa & Asmaul Husna
- Dzikir & tasbih digital
- Download jadwal shalat bulanan (PDF)
- Antarmuka modern
Kami berkomitmen mengembangkan aplikasi ini lebih baik. Dukung kami dengan rating dan ulasan di Play Store!',
                'app_banner' => 'storage/app-banners/73DDrFwniNUdFMRahpOWkNTAdjS6qZHaEC5OD0wN.png',
                'app_screenshots' => '["storage\\/app-screenshots\\/XSqK2a3zXwQqlwVN0SlsgnOQvzZVfimdQgND9Zej.jpg","storage\\/app-screenshots\\/jfdPSiN3xBhNeLBPhMZuV0IocDqw12PyZMsQfpg5.jpg","storage\\/app-screenshots\\/hxJqgrr6AtvbT94v0a4Dn1gXhn7OG7CI6uHtBtxi.jpg","storage\\/app-screenshots\\/ZkJm1jfUn5erMuJkOarAlvHHlGgrKq0tU4qP63wa.jpg","storage\\/app-screenshots\\/dHePeYcibT4j5LLJb2L7cF9Sw8YIAUca6weNTycY.jpg","storage\\/app-screenshots\\/y1WGoL7be094aXArlxvD3cJZkfewRt3DlLeBBxep.jpg","storage\\/app-screenshots\\/Q3sVyPQvBwCrJdrY1EafKUoHgRvyXbse3ELMh37U.jpg","storage\\/app-screenshots\\/F87AGiSIJrrUM05dMRv9Ni6ekIPlol0YZaWGFDH0.jpg","storage\\/app-screenshots\\/CmDwmphClUVM4Ms0Crkpy95thXHI6294uoYjrERW.jpg","storage\\/app-screenshots\\/ICYzgdOMSGUovRebxd5fhdFokuRVwbb3wX0NnU2I.jpg","storage\\/app-screenshots\\/iufVhZ1k39Dxar1x2yJJCCUmh9VOYkXPT1JslPg6.jpg","storage\\/app-screenshots\\/oBPQBpFk7PTa3BSSLIbXwsC0TALvng1kQvJ23wR3.jpg","storage\\/app-screenshots\\/Hu1WD9NxtTEfYIefUzFetd5WqnvzTRIpTUEnAxeH.jpg","storage\\/app-screenshots\\/xGZ9iC4zlBSZahi70mrUra14onsJQQNadEJCNnNa.jpg","storage\\/app-screenshots\\/15vrxZ5x4eT0UxzuvdwZKnmPImxlrDxbuRzEx0vW.jpg","storage\\/app-screenshots\\/2XM5sIBdOBwhMOcKhDfUzNqhLynCtXJyG2aPBKFp.jpg"]',
                'app_version' => '1.0.0',
                'app_package_name' => 'com.islamku.app',
                'app_download_link' => 'https://example.com/islamku.apk',
                'internal_test_link' => 'https://play.google.com/apps/testing/com.islamku.app',
                'app_min_android_version' => '10',
                'app_size' => '24.00',
                'is_active' => 1,
                'created_at' => '2024-12-12 18:03:17',
                'updated_at' => '2024-12-12 18:26:34',
                'deleted_at' => NULL,
            ),
            2 => 
            array (
                'id' => 4,
                'app_name' => 'Hadits: Kumpulan Hadits Lengkap',
                'app_description' => 'Bahasa default - id
Hadits Lengkap v1.0.0:

✨ Fitur:
• Koleksi Lengkap (Arbain, Bulughul Maram, 9 Perawi)
• Teks Arab & Terjemahan Indonesia
• Pencarian Cepat
• Mode Acak

🚀 Performa:
• Ringan & Responsif
• Mode Gelap/Terang',
                'app_banner' => 'storage/app-banners/uPd636eFTrKfvnudAlULDEKjeDqCz5WRbRF7c1eM.png',
                'app_screenshots' => '["storage\\/app-screenshots\\/uhZr7lOqoAKS3TY6GavevAqYH9Nmr5n2QdfMciG3.jpg","storage\\/app-screenshots\\/PzmvaKYCZBnihFKMjMz3nSOCRsEK2a9kXnUH9yyh.jpg","storage\\/app-screenshots\\/Vs7BwHvnHdJOaomTvbGmAV2TX6Wi1GAo3PmzZ2xi.jpg","storage\\/app-screenshots\\/KBmkcAvqSz84pY3lmP6uWiCKNfR6ktSDBM5U5yi0.jpg","storage\\/app-screenshots\\/DY90uajLyraEIxWwGAqNLo9vcedsPAeRGZKzWOWT.jpg","storage\\/app-screenshots\\/xKXoV9XlTG6FYTzElY81JOs5TIjcSqGxyfw8dfzK.jpg"]',
                'app_version' => '1.0.0',
                'app_package_name' => 'com.artadev.haditslengkap',
                'app_download_link' => 'https://example.com/haditslengkap.apk',
                'internal_test_link' => 'https://play.google.com/apps/testing/com.artadev.haditslengkap',
                'app_min_android_version' => '10',
                'app_size' => '15.00',
                'is_active' => 1,
                'created_at' => '2024-12-12 18:47:52',
                'updated_at' => '2024-12-12 18:47:52',
                'deleted_at' => NULL,
            ),
        ));
        
        
    }
}