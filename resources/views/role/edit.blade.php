<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FTPTA Kennel') }} > <a href="{{ route('roles.index') }}">Roles</a> > Update {{ $role->name }} Role
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="max-w-md">
                        <div class="grid grid-cols-1 gap-6">
                            <form action="{{ route('roles.update', $role) }}" method="post">
                                @csrf
                                @method('patch')
                                <label for="name" class="block">
                                    <span class="text-gray-700">Role Name:</span>
                                    <input type="text" name="name" value="{{ old('name') ?? $role->name }}" class="mt-1 block w-full rounded">
                                    @error('name')
                                        <span class="text-red-700 mt-1">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label for="description" class="block">
                                    <span class="text-gray-700">Role Description:</span>
                                    <input type="text" name="description" value="{{ old('description') ?? $role->description }}" class="mt-1 block w-full rounded">
                                    @error('description')
                                        <span class="text-red-700 mt-1">{{ $message }}</span>
                                    @enderror
                                </label>
                                <button type="submit" class="mt-2 py-1 px-3 text-gray-100 bg-blue-600 hover:bg-blue-700 hover:text-gray-50 rounded">Update Role</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
