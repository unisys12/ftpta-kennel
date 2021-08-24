<x-app-layout>
    <x-slot name="header">
        <div class="text-sm breadcrumbs">
            <ul>
                <li><a href="{{ route('dashboard') }}">{{ __('FTPTA Kennel') }}</a></li>
                <li><a href="{{ route('roles.index') }}">Roles</a></li>
                <li>Show</li>
            </ul>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="py-4 pl-4 bg-gray-300">
                        <h2 class="text-2xl">{{ $role->name }}</h2>
                        <p>{{ $role->description }}</p>
                        <a href="{{ route('roles.edit', $role) }}">
                            <button class="mt-4 py-1 px-3 rounded text-gray-100 hover:text-gray-50 bg-blue-600 hover:bg-blue-700">
                                Edit Role
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
