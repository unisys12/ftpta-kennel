<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FTPTA Kennel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-2 gap-6 place-items-center">
                        <div class="border-2 border-gray-400 p-10 rounded-md bg-gray-300">
                            <h2 class="text-2xl font-extrabold" style="text-align: center">
                                {{ $users }}
                            </h2>
                            Users
                        </div>
                        <div class="border-2 border-gray-400 p-10 rounded-md bg-gray-300">
                            <h2 class="text-2xl font-extrabold"  style="text-align: center">
                                {{ $canines }}
                            </h2>
                            Canines
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
