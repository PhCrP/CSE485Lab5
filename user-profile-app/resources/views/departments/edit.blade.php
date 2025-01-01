<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Chỉnh sửa Đơn vị') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <form method="POST" action="{{ route('departments.update', $department->id) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PATCH')

                        <div>
                            <x-input-label for="name" :value="__('Tên Đơn vị')" />
                            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $department->name)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <x-input-label for="code" :value="__('Mã Đơn vị')" />
                            <x-text-input id="code" name="code" type="text" class="mt-1 block w-full" :value="old('code', $department->code)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('code')" />
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $department->email)" />
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>

                        <div>
                            <x-input-label for="phone" :value="__('Số điện thoại')" />
                            <x-text-input id="phone" name="phone" type="text" class="mt-1 block w-full" :value="old('phone', $department->phone)" />
                            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
                        </div>

                        <div>
                            <x-input-label for="address" :value="__('Địa chỉ')" />
                            <x-text-input id="address" name="address" type="text" class="mt-1 block w-full" :value="old('address', $department->address)" />
                            <x-input-error class="mt-2" :messages="$errors->get('address')" />
                        </div>

                        <div class="flex items-center justify-end mt-4 space-x-4">
                            <x-primary-button>{{ __('Cập nhật') }}</x-primary-button>
                            <a href="{{ route('departments.index') }}" class="btn btn-secondary">{{ __('Quay lại') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
