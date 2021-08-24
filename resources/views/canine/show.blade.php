<x-app-layout>

    <x-slot name="header">
        <div class="text-sm breadcrumbs">
            <ul>
                <li><a href="{{ route('dashboard') }}">{{ __('FTPTA Kennel') }}</a></li>
                <li><a href="{{ route('canines.index') }}">Canines</a></li>
                <li>{{ $canine->name }}'s Profile</li>
            </ul>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2">
                        <div>
                            <div class="pt-4">
                                <span class="font-bold text-gray-800">Name:</span>
                                <span>{{ $canine->name }}</span>
                            </div>
                            <div class="pt-4">
                                <span class="font-bold text-gray-800">Breed:</span>
                                <span>{{ $canine->breed }}</span>
                            </div>
                            <div class="pt-4">
                                <span class="font-bold text-gray-800">Gender:</span>
                                <span>{{ $canine->gender }}</span>
                                <span class="text-2xl">&{{ $canine->gender }};</span>
                            </div>
                            <div class="pt-4">
                                <span class="font-bold text-gray-800">Mix:</span>
                                @if ($canine->mixed)
                                    <span class="text-2xl">&checkmark;;</span>
                                @else
                                    <span class="text-2xl">&cross;;</span>
                                @endif
                            </div>
                            <div class="pt-4">
                                <span class="font-bold text-gray-800">Active:</span>
                                @if ($canine->active)
                                    <span class="text-2xl text-green-700">&checkmark;</span>
                                @else
                                    <span class="text-2xl text-red-700">&cross;</span>
                                @endif
                            </div>
                            <div class="pt-4">
                                <span class="font-bold text-gray-800">Owner:</span>
                                <span>{{ $canine->user->name }}</span>
                            </div>
                        </div>
                        <div class="pt-4 place-self-end">
                            <img
                            @if (!str_starts_with($canine->profile_url, 'http'))
                            src="{{ asset('/storage/' . $canine->profile_url) }}"
                            @else
                            src="{{ $canine->profile_url }}"
                            @endif
                            alt="{{ $canine->name }}'s profile image"
                            class="rounded-lg filter shadow-lg"
                            width="300px">
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <a href="{{ route('canines.edit', $canine) }}">
                    <button class="mt-2 py-1 px-3 text-gray-100 bg-blue-600 hover:bg-blue-700 hover:text-gray-50 rounded transition">
                        Edit {{ $canine->name }}'s Profile
                    </button>
                </a>
            </div>
        </div>
    </div>

</x-app-layout>
