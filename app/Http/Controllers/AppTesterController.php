<?php

namespace App\Http\Controllers;

use App\Models\AppTester;
use App\Http\Requests\TesterRequest;
use Illuminate\Support\Facades\Mail;
use App\Mail\TestInvitation;

class AppTesterController extends Controller
{
    public function index()
    {
        $testers = AppTester::with('app')->latest()->get();
        return view('admin.testers.index', compact('testers'));
    }

    public function store(TesterRequest $request)
    {
        $tester = AppTester::create($request->validated());
        return redirect()->back()->with('success', 'Terima kasih telah mendaftar! 🎉 Kami sangat menghargai partisipasi Anda. Link undangan akan segera dikirimkan ke email Anda. Pastikan untuk memeriksa kotak masuk email Anda secara berkala. ✉️');
    }

    public function sendInvitation($id)
    {
        $tester = AppTester::with('app')->findOrFail($id);
        
        Mail::to($tester->email)->send(new TestInvitation($tester));
        
        $tester->update([
            'is_mail_sent' => true,
            'mail_sent_at' => now()
        ]);

        return back()->with('success', 'Undangan telah dikirim ke email penguji');
    }
}
