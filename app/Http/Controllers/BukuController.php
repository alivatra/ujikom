<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->get('search');

        if ($search) {
            $bukus = Buku::where('judul', 'like', '%' . $search . '%')
                ->orWhere('penulis', 'like', '%' . $search . '%')
                ->orWhere('tahun', 'like', '%' . $search . '%')
                ->paginate(10);
        } else {
            $bukus = Buku::paginate(10);
        }

        return view('buku.index', compact('bukus', 'search'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('buku.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|min:3|max:255',
            'penulis' => 'required|min:3|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y')
        ], [
            'judul.required' => 'Judul buku wajib diisi!',
            'judul.min' => 'Judul minimal 3 karakter!',
            'penulis.required' => 'Penulis buku wajib diisi!',
            'penulis.min' => 'Penulis minimal 3 karakter!',
            'tahun.required' => 'Tahun terbit wajib diisi!',
            'tahun.integer' => 'Tahun harus berupa angka!',
            'tahun.min' => 'Tahun minimal 1900!',
            'tahun.max' => 'Tahun tidak boleh melebihi tahun sekarang!'
        ]);

        Buku::create($request->all());
        Session::flash('success', 'Buku berhasil ditambahkan!');

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Buku $buku)
    {
        return view('buku.show', compact('buku'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Buku $buku)
    {
        return view('buku.edit', compact('buku'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Buku $buku)
    {
        $request->validate([
            'judul' => 'required|min:3|max:255',
            'penulis' => 'required|min:3|max:255',
            'tahun' => 'required|integer|min:1900|max:' . date('Y')
        ], [
            'judul.required' => 'Judul buku wajib diisi!',
            'judul.min' => 'Judul minimal 3 karakter!',
            'penulis.required' => 'Penulis buku wajib diisi!',
            'penulis.min' => 'Penulis minimal 3 karakter!',
            'tahun.required' => 'Tahun terbit wajib diisi!',
            'tahun.integer' => 'Tahun harus berupa angka!',
            'tahun.min' => 'Tahun minimal 1900!',
            'tahun.max' => 'Tahun tidak boleh melebihi tahun sekarang!'
        ]);

        $buku->update($request->all());
        Session::flash('success', 'Buku berhasil diupdate!');

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Buku $buku)
    {
        $buku->delete();
        Session::flash('success', 'Buku berhasil dihapus!');

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus!');
    }
}
