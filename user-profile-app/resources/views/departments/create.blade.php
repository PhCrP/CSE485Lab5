<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Thêm mới Đơn vị') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow sm:rounded-lg p-6">
                <h1 class="text-2xl font-semibold mb-6">Thêm mới Đơn vị</h1>

                <form action="{{ route('departments.store') }}" method="POST">
                    @csrf
                    <div class="space-y-4">
                        <div class="mb-3">
                            <label for="name" class="form-label text-gray-700">Tên Đơn vị</label>
                            <input type="text" name="name" id="name" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" value="{{ old('name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="code" class="form-label text-gray-700">Mã Đơn vị</label>
                            <input type="text" name="code" id="code" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" value="{{ old('code') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label text-gray-700">Email</label>
                            <input type="email" name="email" id="email" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" value="{{ old('email') }}">
                        </div>
                        <div class="mb-3">
                            <label for="phone" class="form-label text-gray-700">Số điện thoại</label>
                            <input type="text" name="phone" id="phone" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" value="{{ old('phone') }}">
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label text-gray-700">Địa chỉ</label>
                            <input type="text" name="address" id="address" class="form-control mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50" value="{{ old('address') }}">
                        </div>
                    </div>

                    <div class="mt-6 flex items-center justify-between">
                        <button type="submit" class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2">
                            Thêm mới
                        </button>
                        <a href="{{ route('departments.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-600 text-white rounded-md hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">
                            Quay lại
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
