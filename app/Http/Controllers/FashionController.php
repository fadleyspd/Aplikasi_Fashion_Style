<?php

namespace App\Http\Controllers;

use App\Models\Fashion;
use App\Models\Foto;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;

class FashionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fashion = Fashion::all();
        return view('fashion.index', [
            'fashion' => $fashion,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $fashion = Fashion::all();
        $kategori = Kategori::all();
        return view('fashion.create', [
            'fashion' => $fashion,
            'kategori' => $kategori,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {     
        // dd($request->all());
        $this->validate($request, [
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'judul'     => 'required',
            'deskripsi'     => 'required',
            'panduan'     => 'required',
        ]);

        $photo  = $request->file('foto');
        $filename = date('Y-m-d'). ' ' . $photo->getClientOriginalName();
        $path = 'fashion/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($photo));

        Fashion::create([
            'judul' => $request->judul,
            'panduan' => $request->panduan,
            'deskripsi' => $request->deskripsi,
            'foto' => $filename,
            'id_kategori' => $request->id_kategori,
            'id_user' => 1,
        ]);

        return redirect()->route('fashion.index')->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $fashion = Fashion::find($id);

    if (!$fashion) {
        return redirect()->route('fashion.index')->with('error', 'Category not found');
    }

    return view('fashion.show', compact('fashion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $fashion = Fashion::find($id);
        return view("fashion.edit",[
            "fashion"=> $fashion
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        // dd($id);
        $data = Fashion::find($id);
        
        // Update data user
        $data->update([
            'judul' => $request->judul,
            'panduan' => $request->panduan,
            'deskripsi' => $request->deskripsi,
        ]);
        
        // Update foto jika ada file yang diupload
        if ($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $filename = date('Y-m-d') . $photo->getClientOriginalName();
            $path = 'fashion/' . $filename;

            // Hapus foto lama jika ada
            if ($data->foto) {
                Storage::disk('public')->delete('fashion/' . $data->foto);
            }

            // Simpan foto baru
            Storage::disk('public')->put($path, file_get_contents($photo));
            $data->update(['foto' => $filename]);
        }

        // Redirect ke halaman yang sesuai setelah pembaruan
        return redirect()->route('fashion.index')->with('sukses', 'Diperbarui');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data  = Fashion::find($id);
        Storage::delete('public/fashion/' . $data->foto);
        $data->delete();
        return redirect()->route('fashion.index')->with(['success' => 'Berhasil Dihapus']);
    }
}