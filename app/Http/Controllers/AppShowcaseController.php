<?php

namespace App\Http\Controllers;

use App\Models\AppShowcase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AppShowcaseController extends Controller
{
    public function index(Request $request)
    {
        $query = AppShowcase::where('is_active', true);
        
        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where(function($q) use ($search) {
                $q->where('app_name', 'like', "%{$search}%")
                  ->orWhere('app_description', 'like', "%{$search}%");
            });
        }
        
        $apps = $query->latest()->get();
        return view('apps.index', compact('apps'));
    }

    public function create()
    {
        return view('apps.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'app_name' => 'required|string|max:255',
            'app_description' => 'required|string',
            'app_banner' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'app_version' => 'required|string',
            'app_package_name' => 'required|string|unique:app_showcase',
            'app_download_link' => 'required|url',
            'internal_test_link' => 'required|url',
            'app_min_android_version' => 'required|string',
            'app_size' => 'required|numeric',
            'screenshots.*' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('app_banner')) {
            $file = $request->file('app_banner');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage'), $filename);
            $validated['app_banner'] = 'storage/' . $filename;
        }

        $screenshots = [];
        if ($request->hasFile('screenshots')) {
            foreach ($request->file('screenshots') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('storage'), $filename);
                $screenshots[] = 'storage/' . $filename;
            }
        }
        $validated['app_screenshots'] = $screenshots;
        $validated['is_active'] = true;

        AppShowcase::create($validated);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Aplikasi berhasil ditambahkan');
    }

    public function show($id)
    {
        $app = AppShowcase::where('is_active', true)
            ->withCount('testers')
            ->findOrFail($id);
        return view('apps.show', compact('app'));
    }

    public function edit($id)
    {
        $app = AppShowcase::findOrFail($id);
        return view('apps.edit', compact('app'));
    }

    public function update(Request $request, $id)
    {
        $app = AppShowcase::findOrFail($id);
        
        $validated = $request->validate([
            'app_name' => 'required|string|max:255',
            'app_description' => 'required|string',
            'app_banner' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'app_version' => 'required|string',
            'app_package_name' => 'required|string|unique:app_showcase,app_package_name,' . $id,
            'app_download_link' => 'required|url',
            'internal_test_link' => 'required|url',
            'app_min_android_version' => 'required|string',
            'app_size' => 'required|numeric',
            'screenshots.*' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('app_banner')) {
            // Delete old banner
            if (file_exists(public_path($app->app_banner))) {
                unlink(public_path($app->app_banner));
            }
            
            $file = $request->file('app_banner');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('storage'), $filename);
            $validated['app_banner'] = 'storage/' . $filename;
        }

        if ($request->hasFile('screenshots')) {
            // Delete old screenshots
            foreach ($app->app_screenshots as $screenshot) {
                if (file_exists(public_path($screenshot))) {
                    unlink(public_path($screenshot));
                }
            }
            
            $screenshots = [];
            foreach ($request->file('screenshots') as $file) {
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('storage'), $filename);
                $screenshots[] = 'storage/' . $filename;
            }
            $validated['app_screenshots'] = $screenshots;
        }

        $app->update($validated);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Aplikasi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $app = AppShowcase::findOrFail($id);
        
        // Delete files
        if (file_exists(public_path($app->app_banner))) {
            unlink(public_path($app->app_banner));
        }
        
        foreach ($app->app_screenshots as $screenshot) {
            if (file_exists(public_path($screenshot))) {
                unlink(public_path($screenshot));
            }
        }
        
        $app->delete();

        return redirect()->route('admin.dashboard')
            ->with('success', 'Aplikasi berhasil dihapus');
    }

    public function toggleStatus($id)
    {
        $app = AppShowcase::findOrFail($id);
        $app->update(['is_active' => !$app->is_active]);

        return redirect()->route('admin.dashboard')
            ->with('success', 'Status aplikasi berhasil diubah');
    }
}
