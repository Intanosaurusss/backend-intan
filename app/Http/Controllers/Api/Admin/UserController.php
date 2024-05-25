<?php

namespace App\Http\Controllers\Api\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'nisn' => 'required|unique:users|digits:10', // Validasi 'nisn' pada saat pembuatan user baru
        ]);

        $user = new User([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'nisn' => $request->get('nisn'), // Menambahkan 'nisn' pada user baru
        ]);

        $user->save();

        // Tambahkan peran 'user' ke user baru
        $user->assignRole('user');

        return response()->json($user, 201);
    }

    public function show($id)
    {
        $user = User::find($id);
        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        if ($user) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email|unique:users,email,' . $id,
                'password' => 'nullable|min:6',
            ]);

            $user->name = $request->get('name');
            $user->email = $request->get('email');
            if ($request->get('password')) {
                $user->password = Hash::make($request->get('password'));
            }
            // 'nisn' tidak diupdate
            $user->save();

            return response()->json($user);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return response()->json(['message' => 'User deleted']);
        } else {
            return response()->json(['message' => 'User not found'], 404);
        }
    }
}
