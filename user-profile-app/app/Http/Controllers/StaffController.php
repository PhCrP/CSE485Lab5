<?php

namespace App\Http\Controllers;

use App\Models\Staff;
use App\Models\Department;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    // Phương thức hiển thị danh sách nhân viên
    public function index()
    {
        // Lấy danh sách nhân viên với thông tin phòng ban
        $staff = Staff::orderBy('id', 'desc')->paginate(5);
        return view('staff.index', compact('staff'));  // Trả về view danh sách nhân viên
    }

    public function create()
    {
        $departments = Department::all();
        // Hiển thị form tạo mới phòng ban
        return view('staff.create', compact('departments'));
    }

    // Phương thức tạo nhân viên mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        // Tạo nhân viên mới
        Staff::create($request->all());

        return redirect()->route('staff.index')->with('success', 'Staff created successfully');  // Redirect về trang danh sách nhân viên
    }

    // Phương thức xem chi tiết nhân viên
    public function show($id)
    {
        // Lấy chi tiết nhân viên và thông tin phòng ban
        $staff = Staff::with('department')->findOrFail($id);
        return view('staff.show', compact('staff'));  // Trả về view chi tiết nhân viên
    }

    // Phương thức cập nhật thông tin nhân viên
    public function update(Request $request, $id)
    {
        $staff = Staff::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'department_id' => 'required|exists:departments,id',
        ]);

        $staff->update($request->all());

        return redirect()->route('staff.index')->with('success', 'Staff updated successfully');  // Redirect về trang danh sách nhân viên
    }

    public function edit($id)
    {
        // Lấy nhân viên cần chỉnh sửa
        $staff = Staff::findOrFail($id);

        // Lấy danh sách phòng ban
        $departments = Department::all();

        // Trả về view chỉnh sửa thông tin nhân viên với dữ liệu nhân viên và danh sách phòng ban
        return view('staff.edit', compact('staff', 'departments'));
    }

    // Phương thức chỉnh sửa thông tin cá nhân của nhân viên hiện tại
    public function editMyProfile()
    {
        $staff = auth()->user()->staff;

        if (!$staff) {
            return redirect()->route('dashboard')->with('error', 'Thông tin cá nhân không tồn tại.');
        }

        return view('staff.editMyProfile', compact('staff'));  // Trả về view chỉnh sửa thông tin cá nhân
    }

    // Phương thức cập nhật thông tin cá nhân của nhân viên
    public function updateMyProfile(Request $request)
    {
        $staff = auth()->user()->staff;

        if (!$staff) {
            return redirect()->route('dashboard')->with('error', 'Thông tin cá nhân không tồn tại.');
        }

        $validated = $request->validate([
            'phone' => 'nullable|string',
            'email' => 'nullable|email',
            'bio' => 'nullable|string',
        ]);

        $staff->update($validated);

        return redirect()->route('dashboard')->with('success', 'Cập nhật thông tin cá nhân thành công.');
    }

    // Phương thức xóa nhân viên
    public function destroy($id)
    {
        Staff::destroy($id);

        return redirect()->route('staff.index')->with('success', 'Staff deleted successfully');  // Redirect về trang danh sách nhân viên
    }
}
