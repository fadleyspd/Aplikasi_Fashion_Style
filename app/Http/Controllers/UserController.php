<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::orderBy('id', 'DESC')->get(); // Call get() to execute the query
        return view('user.index', [
            'data' => $data,
            'title' => 'User',
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all(); // Pastikan Anda sudah mengimpor namespace Role di atas

        return view('user.create', [
            'title' => 'Tambah User',
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


     //  dd($request->email);
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required', // Menggunakan konfirmasi password yang sudah disediakan Laravel
        ]);
        

        
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        // $input['id_role'] = $request['id_role'];

        $user = User::create($input);

        return redirect()->route('user.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::find($id);
        return view('user.show', [
            'user' => $user,
            'title' => 'Detail',
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::find($id);
        return view('user.edit', [
            'user' => $user,
            'title' => 'Edit-User'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = User::find($id);
        
        // Update data user
        $data->update([
            'name' => $request->name,
            'jenis_kelamin' => $request->jenis_kelamin,
            'email' => $request->email,
            'username' => $request->username,
            'bio' => $request->bio,
        ]);
        
        // Update foto jika ada file yang diupload
        if ($request->hasFile('foto')) {
            $photo = $request->file('foto');
            $filename = date('Y-m-d') . $photo->getClientOriginalName();
            $path = 'user/' . $filename;

            // Hapus foto lama jika ada
            if ($data->foto) {
                Storage::disk('public')->delete('user/' . $data->foto);
            }

            // Simpan foto baru
            Storage::disk('public')->put($path, file_get_contents($photo));
            $data->update(['foto' => $filename]);
        }

        // Redirect ke halaman yang sesuai setelah pembaruan
        return redirect()->route('user.index')->with('sukses', 'Diperbarui');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        return redirect()->route('user.index')
            ->with('success', 'User deleted successfully');
    }
}