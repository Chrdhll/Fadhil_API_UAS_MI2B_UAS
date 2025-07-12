<?php

namespace App\Http\Controllers;

use App\Models\Books;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $books = Books::all();
        return response()->json($books);
    }

    // Menampilkan satu data berdasarkan ID
    public function show($id)
    {
        $books = Books::find($id);
        if (!$books) return response()->json(['message' => 'Data tidak ditemukan'], 404);
        return response()->json($books);
    }

    // Membuat data baru
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
        ]);

        $books = Books::create($request->all());
        return response()->json($books, 201);
    }

    // Mengupdate data berdasarkan ID
    public function update(Request $request, $id)
    {
        $books = Books::find($id);
        if (!$books) return response()->json(['message' => 'Data tidak ditemukan'], 404);
        $books->update($request->all());
        return response()->json($books);
    }

    // Menghapus data berdasarkan ID
    public function destroy($id)
    {
        $books = Books::find($id);
         if (!$books) return response()->json(['message' => 'Data tidak ditemukan'], 404);

        $books->delete();
        return response()->json(['message' => 'Data berhasil dihapus']);
    }
}