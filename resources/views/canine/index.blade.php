<x-app-layout>

    <x-slot name="header">
        <div class="text-sm breadcrumbs">
            <ul>
                <li><a href="{{ route('dashboard') }}">{{ __('FTPTA Kennel') }}</a></li>
                <li>Canines</li>
            </ul>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (count($canines) < 1)
                        <p>The Kennel is Empty!</p>
                    @else
                    <!-- Canines Table -->
                    <livewire:canines-table/>
                    @endif
                </div>
            </div>
            {{-- @foreach (Auth::user()->roles as $role)
                @if($role->name == "Admin")
                <div class="">
                    <a href="{{ route('canines.create') }}">
                        <button class="mt-2 py-1 px-3 text-gray-100 bg-blue-600 hover:bg-blue-700 hover:text-gray-50 rounded">
                            Register New Canine
                        </button>
                    </a>
                </div>
                @endif
            @endforeach --}}
        </div>
    </div>

</x-app-layout>
