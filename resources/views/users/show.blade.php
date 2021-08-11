<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FTPTA Kennel') }} > <a href="{{ route('users.index') }}">Users</a>  > {{ $user->name }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg">Personal Information</h3>
                    <hr>
                    <div class="grid grid-cols-2">
                        <div>
                            <div class="pt-4">
                                <span class="font-bold text-gray-800">Name:</span>
                                <span>{{ $user->name }}</span>
                            </div>
                            <div class="pt-4">
                                <span class="font-bold text-gray-800">Email:</span>
                                <span>{{ $user->email }}</span>
                            </div>
                            <div class="pt-4">
                                <span class="font-bold text-gray-800">Email Verified:</span>
                                @if(!$user->email_verified_at)
                                <span class="text-red-500">Not Verified</span>
                                @else
                                <span>{{ $user->email_verified_at }}</span>
                                @endif
                            </div>
                            <div class="pt-4">
                                <span class="font-bold text-gray-800">Address:</span>
                                <span>{{ $user->address }}</span>
                            </div>
                            <div class="pt-4">
                                <span class="font-bold text-gray-800">City:</span>
                                <span>{{ $user->city }}</span>
                            </div>
                            <div class="pt-4">
                                <span class="font-bold text-gray-800">State:</span>
                                <span>{{ $user->state }}</span>
                            </div>
                            <div class="pt-4">
                                <span class="font-bold text-gray-800">Zip:</span>
                                <span>{{ $user->zip }}</span>
                            </div>
                            <div class="pt-4">
                                <span class="font-bold text-gray-800">Phone:</span>
                                <a href="tel:{{ $user->phone }}">{{ $user->phone }}</a>
                            </div>
                            </div>
                            <div class="pt-4 place-self-end">
                                @if(!str_starts_with($user->profile_url,'http'))
                                <img src="{{ asset('storage/'.$user->profile_url) }}" class="rounded-lg filter shadow-lg" width="300px" alt="{{ $user->name }} profile image">
                                @else
                                <img src="{{ $user->profile_url }}" class="rounded-lg filter shadow-lg" width="300px" alt="{{ $user->name }} profile image">
                                @endif
                            </div>
                        </div>
                        <h3 class="text-lg mt-2">Roles</h3>
                        <hr>
                        <div class="mt-2">
                            @foreach ($user->roles as $role)
                            <span class="p-1 rounded bg-gray-200">{{ $role->name }}</span>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="">
                    <a href="{{ route('users.edit', $user) }}">
                        <button class="mt-2 py-1 px-3 text-gray-100 bg-blue-600 hover:bg-blue-700 hover:text-gray-50 rounded transition">
                            Edit User
                        </button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
