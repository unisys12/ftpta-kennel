<x-app-layout>
    <x-slot name="header">
        <div class="text-sm breadcrumbs">
            <ul>
                <li><a href="{{ route('dashboard') }}">{{ __('FTPTA Kennel') }}</a></li>
                <li><a href="{{ route('canines.index') }}">Documents</a></li>
                <li>Create</li>
            </ul>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="max-w-md">
                        <div class="grid grid-cols-1 gap-6">
                            @livewire('upload-document')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
