<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\AppShowcase;
use App\Models\AppTester;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard()
    {
        $apps = AppShowcase::withCount('testers')->get();
        $testers = AppTester::with('app')
            ->where('is_mail_sent', false)
            ->latest()
            ->take(5)
            ->get();
            
        return view('admin.dashboard', compact('apps', 'testers'));
    }

    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
