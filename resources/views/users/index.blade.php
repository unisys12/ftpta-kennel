<x-app-layout>
    <x-slot name="header">
        <div class="text-sm breadcrumbs">
            <ul>
                <li><a href="{{ route('dashboard') }}">{{ __('FTPTA Kennel') }}</a></li>
                <li>Users</li>
            </ul>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (count($users) < 1)
                    <p>There are currently no users!
                    @else
                    <livewire:users-table/>
                    @endif
                </div>
            </div>
            @foreach (Auth::user()->roles as $role)
                @if($role->name == "Admin")
                <div class="">
                    <a href="{{ route('createUser') }}">
                        <button class="btn btn-primary">
                            Register New User
                        </button>
                    </a>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>
