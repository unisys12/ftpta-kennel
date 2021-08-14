<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FTPTA Kennel') }} > <a href="{{ route('users.index') }}">Users</a> > Edit
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="max-w-md">
                        <div class="grid grid-cols-1 gap-6">
                            <form action="{{ route('users.update', $user) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <fieldset class="border-2 border-gray-800 p-3">
                                    <legend class="font-bold text-xl text-gray-800">Personal Information</legend>
                                    <label for="name" class="block pt-2">
                                        <span class="text-gray-700">User Name:</span>
                                        <input type="text" name="name" value="{{ old('name') ?? $user->name }}" class="mt-1 block w-full rounded">
                                        @error('name')
                                            <span class="text-red-700 mt-1">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <label for="email" class="block pt-2">
                                        <span class="text-gray-700">User Email:</span>
                                        <input type="text" name="email" value="{{ old('email') ?? $user->email }}" class="mt-1 block w-full rounded">
                                        @error('email')
                                            <span class="text-red-700 mt-1">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <label for="address" class="block pt-2">
                                        <span class="text-gray-700">User Address:</span>
                                        <input type="text" name="address" value="{{ old('address') ?? $user->address }}" class="mt-1 block w-full rounded">
                                        @error('address')
                                            <span class="text-red-700 mt-1">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <label for="city" class="block pt-2">
                                        <span class="text-gray-700">User City:</span>
                                        <input type="text" name="city" value="{{ old('city') ?? $user->city }}" class="mt-1 block w-full rounded">
                                        @error('city')
                                            <span class="text-red-700 mt-1">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <label for="state" class="block pt-2">
                                        <span class="text-gray-700">User State:</span>
                                        <input type="text" name="state" value="{{ old('state') ?? $user->state }}" class="mt-1 block w-full rounded">
                                        @error('state')
                                            <span class="text-red-700 mt-1">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <label for="zip" class="block pt-2">
                                        <span class="text-gray-700">User Zip:</span>
                                        <input type="text" name="zip" value="{{ old('zip') ?? $user->zip }}" class="mt-1 block w-full rounded">
                                        @error('zip')
                                            <span class="text-red-700 mt-1">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <label for="phone" class="block pt-2">
                                        <span class="text-gray-700">User Phone:</span>
                                        <input type="tel" name="phone" value="{{ old('phone') ?? $user->phone }}" class="mt-1 block w-full rounded">
                                        @error('phone')
                                            <span class="text-red-700 mt-1">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <label for="profile_upload" class="block pt-2">
                                        <span class="text-gray-700">Upload Profile Image:</span>
                                        <input type="file" accept="image/*" name="profile_upload" class="mt-1 block w-full rounded">
                                        @error('profile_upload')
                                            <span class="text-red-700 mt-1">{{ $message }}</span>
                                        @enderror
                                    </label>
                                    <h3 class="text-xl">Or</h3>
                                    <label for="profile_url" class="block pt-2">
                                        <span class="text-gray-700">Enter a URL to a Photo:</span>
                                        <input type="text" name="profile_url" value="{{ old('profile_url') ?? $user->profile_url }}" class="mt-1 block w-full rounded">
                                        @error('profile_url')
                                            <span class="text-red-700 mt-1">{{ $message }}</span>
                                        @enderror
                                    </label>
                                </fieldset>

                                <fieldset class="border-2 border-gray-800 p-3 mt-4">
                                    <legend class="font-bold text-xl text-gray-800">
                                        <h3>Assign User Roles</h3>
                                    </legend>
                                    @foreach ($roles as $role)
                                            <label for="{{ $role->name }}">{{ $role->name }} Role</label>
                                            <input
                                            type="checkbox"
                                            name="roles[]"
                                            class="mx-2"
                                            id="{{ $role->name }}_checkbox"
                                            value="{{ $role->id }}"
                                            @foreach ($user->roles as $assigned_role)
                                                @if($assigned_role->pivot->role_id == $role->id) checked @endif
                                            @endforeach
                                            >
                                    @endforeach
                                    @error('roles')
                                        <span class="text-red-700 mt-1">{{ $message }}</span>
                                    @enderror
                                </fieldset>

                                <button type="submit" class="mt-4 py-1 px-3 text-gray-100 bg-blue-600 hover:bg-blue-700 hover:text-gray-50 rounded">Update {{ $user->name }}'s Profile</button>
                            </form>
                            <div class="mt-4">
                                <p class="italic">User Passwords cannot be changed from this interface!</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
