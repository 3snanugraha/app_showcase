@component('mail::message')
# 🎉 Selamat {{ $tester->name }}! 🎉

Kami sangat senang Anda telah bergabung sebagai penguji aplikasi {{ $tester->app->app_name }}! 🚀

Untuk memulai petualangan pengujian Anda, silakan klik tombol ajaib di bawah ini:

@component('mail::button', ['url' => $tester->app->internal_test_link])
🔥 Mulai Pengujian Sekarang! 🔥
@endcomponent

✨ Kontribusi Anda sangat berharga bagi kami! Dengan bantuan Anda, kami dapat membuat aplikasi ini menjadi lebih baik untuk semua pengguna.

Jika Anda memiliki pertanyaan, jangan ragu untuk menghubungi tim kami.

Salam Hangat, 🤝<br>
Tim {{ config('app.name') }} 💫
@endcomponent