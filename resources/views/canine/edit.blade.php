<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FTPTA Kennel') }} > <a href="{{ route('canines.index') }}">Canines</a> > Edit
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="max-w-md">
                        <div class="grid grid-cols-1 gap-6">
                            <form action="{{ route('canines.update', $canine->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('patch')
                                <label for="name" class="block pt-2">
                                    <span class="text-gray-700">Name:</span>
                                    <input type="text" name="name" value="{{ old('name') ?? $canine->name }}" class="mt-1 block w-full rounded">
                                    @error('name')
                                        <span class="text-red-700 mt-1">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label for="breed" class="block pt-2">
                                    <span class="text-gray-700">Breed:</span>
                                    <input type="text" name="breed" value="{{ old('breed') ?? $canine->breed }}" class="mt-1 block w-full rounded">
                                    @error('breed')
                                        <span class="text-red-700 mt-1">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label for="gender" class="block pt-2">
                                    <span class="text-gray-700">Gender:</span>
                                    <select name="gender" id="gender" class="mt-1 block w-full rounded"s>
                                        <option value="{{ $canine->gender }}">{{ $canine->gender }}</option>
                                        <option value="female">Female</option>
                                        <option value="male">Male</option>
                                    </select>
                                    @error('gender')
                                        <span class="text-red-700 mt-1">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label for="mixed" class="block pt-2">
                                    <span class="text-gray-700">Mixed:</span>
                                    <input type="checkbox" name="mixed" class="mt-1 block w-full rounded" @if($canine->mixed) checked @endif>
                                    @error('mixed')
                                        <span class="text-red-700 mt-1">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label for="active" class="block pt-2">
                                    <span class="text-gray-700">Active:</span>
                                    <input type="checkbox" name="active" class="mt-1 block w-full rounded" @if ($canine->active) checked @endif>
                                    @error('active')
                                        <span class="text-red-700 mt-1">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label for="user_id" class="block pt-2">
                                    <span class="text-gray-700">Owner:</span>
                                    <select name="user_id" class="mt-1 block w-full rounded">
                                        <option value="{{ $canine->user->id }}">{{ $canine->user->name }}</option>
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('user_id')
                                        <span class="text-red-700 mt-1">{{ $message }}</span>
                                    @enderror
                                </label>
                                <label for="profile_upload" class="block pt-2">
                                    <span class="text-gray-700">Upload Profile Image:</span>
                                    <input type="file" accept="image/*" name="profile_upload" class="mt-1 block w-full rounded">
                                    <span class="text-gray-600 text-sm">Files must be less than 3MB in size</span>
                                    @error('profile_upload')
                                        <span class="text-red-700 mt-1">{{ $message }}</span>
                                    @enderror
                                </label>
                                <h3 class="text-xl">Or</h3>
                                <label for="profile_url" class="block pt-2">
                                    <span class="text-gray-700">Enter a URL to a Photo:</span>
                                    <input type="text" name="profile_url" value="{{ old('profile_url') }}" class="mt-1 block w-full rounded">
                                    @error('profile_url')
                                        <span class="text-red-700 mt-1">{{ $message }}</span>
                                    @enderror
                                </label>
                                <button type="submit" class="mt-2 py-1 px-3 text-gray-100 bg-blue-600 hover:bg-blue-700 hover:text-gray-50 rounded">Update Canine</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
