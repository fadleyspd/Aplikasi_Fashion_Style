<?php

namespace App\Http\Controllers;

use App\Models\Fashion;
use App\Models\Foto;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;
use Illuminate\Support\Facades\Storage;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all();
        return view("kategori.index",[
            "kategori"=> $kategori
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kategori.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        FacadesSession::flash('kategori', $request->kategori);
        $this->validate($request, [
            'image'     => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
            'kategori'     => 'required',
        ]);

        //upload image
        $image = $request->file('image');
        $image->storeAs('public/kategori/', $image->hashName());
        $data = [
            'nama_kategori' => $request->kategori,
            'foto' => $image->hashName(),
        ];

        Kategori::create($data);
        return redirect()->route('kategori.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kategori = Kategori::find($id);

    if (!$kategori) {
        return redirect()->route('kategori.index')->with('error', 'Category not found');
    }

    return view('kategori.show', compact('kategori'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategori = Kategori::find($id);
        return view("kategori.edit",[
            "kategori"=> $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $this->validate($request, [
            'image'     => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'kategori'     => 'required',
        ]);

    $data = Kategori::find($id);

    // cek apakah Update Gambar atau tidak
    if ($request->hasFile('image')) {

        //Upload Gambar baru kedalam Folder
        $image = $request->file('image');
        $image->storeAs('/public/kategori/', $image->hashName());

        //Hapus Gambar Lama yang ada di folder
        Storage::delete('/public/kategori/' . $data->foto);

        //update data dengan gambar
        $data->update([
            'foto'     => $image->hashName(),
            'nama_kategori' => $request->kategori,
        ]);
    } else {

        //update data tanpa gambar
        $data->update([
            'nama_kategori' => $request->kategori,
        ]);
    }
    return redirect()->route('kategori.index')->with(['success' => 'Data Berhasil Disimpan']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data  = Kategori::find($id);
        Storage::delete('public/kategori/' . $data->foto);
        $data->delete();
        return redirect()->route('kategori.index')->with(['success' => 'Berhasil Dihapus']);
    }
}