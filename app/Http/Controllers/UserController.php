<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Database\Capsule\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index() {
        $user = UserModel::with('level')->get();
        return view('user', ['data' => $user]);
    }

    public function tambah() {
        return view('user_tambah');
    }

    public function tambah_simpan(Request $request) {
        $user = UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password),
            'level_id' => (int) $request->level_id
        ]);
    
        return redirect('/user');
    }
    
    public function ubah($id) {
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan($id, Request $request) {
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make($request->password);
        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/user');
    }

    public function hapus($id) {
        try {
            $user = UserModel::findOrFail($id);
            $user->delete();
            return redirect('/user')->with('success', 'User berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/user')->with('error', 'Gagal menghapus user: ' . $e->getMessage());
        }
    }
}