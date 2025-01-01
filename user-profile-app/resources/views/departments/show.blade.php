<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chi tiết Đơn vị') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <h1 class="text-2xl font-semibold mb-6">{{ $department->name }}</h1>

                <div class="space-y-4">
                    <p><strong class="text-gray-700">Mã Đơn vị:</strong> {{ $department->code }}</p>
                    <p><strong class="text-gray-700">Email:</strong> {{ $department->email }}</p>
                    <p><strong class="text-gray-700">Số điện thoại:</strong> {{ $department->phone }}</p>
                    <p><strong class="text-gray-700">Website:</strong> {{ $department->website }}</p>
                    <p><strong class="text-gray-700">Địa chỉ:</strong> {{ $department->address }}</p>
                </div>

                <div class="mt-6">
                    <a href="{{ route('departments.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-lg hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                        Quay lại
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
