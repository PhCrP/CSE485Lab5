<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Danh sách Đơn vị') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex justify-between items-center mb-4">
                    <a href="{{ route('departments.create') }}" class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Thêm mới Đơn vị</a>
                </div>

                @if(session('success'))
                <div class="mt-3 text-green-600 bg-green-100 p-4 rounded-md">
                    {{ session('success') }}
                </div>
                @endif

                <div class="overflow-x-auto bg-white shadow sm:rounded-lg">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tên</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Mã</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Hành động</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($departments as $department)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration + ($departments->currentPage() - 1) * $departments->perPage() }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $department->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $department->code }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $department->email }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <a href="{{ route('departments.show', $department) }}">
                                        <x-primary-button class="bg-blue-500 hover:bg-blue-600 text-white">Chi tiết</x-primary-button>
                                    </a>
                                    <a href="{{ route('departments.edit', $department) }}">
                                        <x-primary-button class="bg-yellow-500 hover:bg-yellow-600 text-white">Chỉnh sửa</x-primary-button>
                                    </a>
                                    <button
                                        class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600"
                                        data-department-id="{{ $department->id }}"
                                        onclick="openDeleteModal(this)">
                                        Xóa
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="mt-6">
                    <!-- Phân trang -->
                    <div class="d-flex justify-content-center">
                        {{ $departments->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal xác nhận xóa -->
    <div id="deleteModal" class="fixed inset-0 flex items-center justify-center z-50 hidden">
        <div class="bg-gray-500 bg-opacity-75 absolute inset-0"></div>
        <div class="bg-white rounded-lg p-8 relative z-10 max-w-md mx-auto">
            <h5 class="text-xl font-semibold text-gray-800 mb-4">Xác nhận xóa</h5>
            <div class="mb-4 text-gray-600">
                Bạn có chắc muốn xóa Đơn vị này?
            </div>
            <div class="flex justify-between">
                <form id="deleteForm" method="POST" action="">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Xóa</button>
                </form>
                <button type="button" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400" onclick="closeDeleteModal()">Hủy</button>
            </div>
        </div>
    </div>

    <script>
        // Mở modal xóa
        function openDeleteModal(button) {
            const departmentId = button.getAttribute('data-department-id');
            const form = document.getElementById('deleteForm');
            form.action = '/departments/' + departmentId;

            const modal = document.getElementById('deleteModal');
            modal.classList.remove('hidden');
        }

        // Đóng modal xóa
        function closeDeleteModal() {
            const modal = document.getElementById('deleteModal');
            modal.classList.add('hidden');
        }
    </script>
</x-app-layout>