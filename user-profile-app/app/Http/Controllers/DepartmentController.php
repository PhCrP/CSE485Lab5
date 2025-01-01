<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index()
    {
        // Lấy danh sách các phòng ban và hiển thị view danh sách
        $departments = Department::orderBy('id', 'desc')->paginate(5);
        return view('departments.index', compact('departments'));
    }

    public function create()
    {
        // Hiển thị form tạo mới phòng ban
        return view('departments.create');
    }

    public function store(Request $request)
    {
        // Tạo phòng ban mới
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:10|unique:departments,code',
        ]);

        Department::create($request->all());
        return redirect()->route('departments.index')->with('success', 'Phòng ban đã được tạo thành công.');
    }

    public function show($id)
    {
        // Xem chi tiết phòng ban
        $department = Department::findOrFail($id);
        return view('departments.show', compact('department'));
    }

    public function edit($id)
    {
        // Hiển thị form chỉnh sửa phòng ban
        $department = Department::findOrFail($id);
        return view('departments.edit', compact('department'));
    }

    public function update(Request $request, $id)
    {
        // Cập nhật phòng ban
        $department = Department::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'code' => "required|string|max:10|unique:departments,code,{$id}",
        ]);

        $department->update($request->all());
        return redirect()->route('departments.index')->with('success', 'Phòng ban đã được cập nhật thành công.');
    }

    public function destroy($id)
    {
        // Xóa phòng ban
        Department::destroy($id);
        return redirect()->route('departments.index')->with('success', 'Phòng ban đã được xóa thành công.');
    }
}
