<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chi tiết Cán bộ, Giảng viên') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <div class="mb-6">
                    <h2 class="text-2xl font-semibold text-gray-800">{{ $staff->name }}</h2>
                </div>

                <div class="space-y-4">
                    <p><strong class="font-medium text-gray-700">Chức danh:</strong> {{ $staff->title }}</p>
                    <p><strong class="font-medium text-gray-700">Học hàm:</strong> {{ $staff->academic_rank }}</p>
                    <p><strong class="font-medium text-gray-700">Học vị:</strong> {{ $staff->degree }}</p>
                    <p><strong class="font-medium text-gray-700">Email:</strong> {{ $staff->email }}</p>
                    <p><strong class="font-medium text-gray-700">Số điện thoại:</strong> {{ $staff->phone }}</p>
                    <p><strong class="font-medium text-gray-700">Đơn vị:</strong> {{ $staff->department->name }}</p>
                </div>

                <div class="mt-6">
                    <a href="{{ route('staff.index') }}" class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">
                        Quay lại
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
