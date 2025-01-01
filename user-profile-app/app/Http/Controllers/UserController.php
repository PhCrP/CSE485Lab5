<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        // Lấy danh sách người dùng
        $users = User::with('staff')->get();
        return response()->json($users);
    }

    public function store(Request $request)
    {
        // Tạo người dùng mới
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'guest',
            'staff_id' => $request->staff_id,
        ]);

        return response()->json(['message' => 'User created successfully', 'user' => $user]);
    }

    public function show($id)
    {
        // Xem chi tiết người dùng
        $user = User::with('staff')->findOrFail($id);
        return response()->json($user);
    }

    public function update(Request $request, $id)
    {
        // Cập nhật thông tin người dùng
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => "required|string|email|max:255|unique:users,email,{$id}",
            'password' => 'nullable|string|min:6',
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password,
            'role' => $request->role ?? $user->role,
            'staff_id' => $request->staff_id,
        ]);

        return response()->json(['message' => 'User updated successfully', 'user' => $user]);
    }

    public function destroy($id)
    {
        // Xóa người dùng
        User::destroy($id);
        return response()->json(['message' => 'User deleted successfully']);
    }
}
