<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post; 
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * store
     *
     * @param  Request  $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validasi formulir
        $request->validate([
            // Aturan validasi untuk setiap field
        ]);
    
        // Proses upload gambar dan simpan data
        // ...
    
        // Redirect ke halaman yang sesuai
        // Contoh:
        return redirect()->route('dashboard')->with(['success' => 'Data berhasil disimpan!']);
    }
    
    public function dashboard()
    {
        $posts = Post::get(); // Mengambil data posting dari database menggunakan model Post
        return view('dashboard', compact('posts'));
    }
    
    public function index()
    {
        $posts = Post::latest()->paginate(5);
        return view('posts.index', compact('posts'));
    }
}
