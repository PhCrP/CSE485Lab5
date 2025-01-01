<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Danh sách Cán bộ, Giảng viên') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex justify-between items-center mb-4">
                    <a href="{{ route('staff.create') }}" class="btn btn-primary px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Thêm mới Cán bộ, Giảng viên</a>

                    @if(session('success'))
                    <div class="mt-3 text-green-600 bg-green-100 p-4 rounded-md">
                        {{ session('success') }}
                    </div>
                    @endif
                </div>

                <div class="overflow-x-auto bg-white shadow sm:rounded-lg">
                    <table class="min-w-full table-auto">
                        <thead class="bg-gray-100">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">#</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tên</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Chức danh</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Học hàm</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Học vị</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Đơn vị</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Hành động</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach($staff as $person)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $loop->iteration + ($staff->currentPage() - 1) * $staff->perPage() }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $person->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $person->title }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $person->academic_rank }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $person->degree }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $person->department->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                    <a href="{{ route('staff.show', $person) }}">
                                        <x-primary-button class="bg-blue-500 hover:bg-blue-600 text-white">Chi tiết</x-primary-button>
                                    </a>
                                    <a href="{{ route('staff.edit', $person) }}">
                                        <x-primary-button class="bg-yellow-500 hover:bg-yellow-600 text-white">Chỉnh sửa</x-primary-button>
                                    </a>
                                    <button class="btn btn-danger btn-sm text-white bg-red-500 hover:bg-red-600 px-4 py-2 rounded" data-bs-toggle="modal" data-bs-target="#confirmDeleteModal" data-task-id="{{ $person->id }}">
                                        Xóa
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Phân trang -->
                <div class="d-flex justify-content-center">
                    {{ $staff->links() }}
                </div>
            </div>
        </div>
    </div>

    <!-- Modal xác nhận xóa -->
    <div class="fixed inset-0 flex items-center justify-center z-50 hidden" id="confirmDeleteModal">
        <div class="bg-gray-500 bg-opacity-75 absolute inset-0"></div>
        <div class="bg-white rounded-lg p-8 relative z-10 max-w-md mx-auto">
            <h5 class="text-xl font-semibold text-gray-800 mb-4">Xác nhận xóa</h5>
            <div class="mb-4 text-gray-600">
                Bạn có chắc muốn xóa Cán bộ, Giảng viên này?
            </div>
            <div class="flex justify-between">
                <form id="deleteForm" method="POST" action="{{ route('staff.destroy', ':id') }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600">Xóa</button>
                </form>
                <button type="button" class="px-4 py-2 bg-gray-300 text-gray-700 rounded-lg hover:bg-gray-400" data-bs-dismiss="modal">Hủy</button>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteModal = document.getElementById('confirmDeleteModal');
            const modalCloseButtons = deleteModal.querySelectorAll('[data-bs-dismiss="modal"]');

            // Mở modal khi nhấn nút xóa
            const openModalButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
            openModalButtons.forEach(button => {
                button.addEventListener('click', function() {
                    const personId = button.getAttribute('data-task-id');
                    const form = document.getElementById('deleteForm');

                    const action = form.action.replace(':id', personId);
                    form.action = action;

                    // Hiển thị modal
                    deleteModal.classList.remove('hidden');
                });
            });

            // Đóng modal khi nhấn nút "Hủy" hoặc bên ngoài modal
            modalCloseButtons.forEach(button => {
                button.addEventListener('click', function() {
                    deleteModal.classList.add('hidden');
                });
            });

            // Đóng modal khi nhấn vào nền mờ ngoài modal
            deleteModal.addEventListener('click', function(event) {
                if (event.target === deleteModal) {
                    deleteModal.classList.add('hidden');
                }
            });
        });
    </script>

</x-app-layout>