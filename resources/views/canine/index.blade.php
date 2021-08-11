<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FTPTA Kennel') }} > Canines
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (count($canines) < 1)
                        <p>The Kennel is Empty!</p>
                    @else
                    <table>
                        <thead>
                            <tr>
                                <th class="p-1 border border-indigo-400">ID</th>
                                <th class="p-1 border border-indigo-400">NAME</th>
                                <th class="p-1 border border-indigo-400">BREED</th>
                                <th class="p-1 border border-indigo-400">GENDER</th>
                                <th class="p-1 border border-indigo-400">MIXED</th>
                                <th class="p-1 border border-indigo-400">ACTIVE</th>
                                <th class="p-1 border border-indigo-400">OWNER</th>
                                <th class="p-1 border border-indigo-400">CREATED AT</th>
                                <th class="p-1 border border-indigo-400">UPDATED AT</th>
                                <th class="p-1 border border-indigo-400" colspan="2">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($canines as $canine)
                                <tr class="hover:bg-indigo-50 transition">
                                    <td class="py-1 px-2 border border-indigo-300">{{ $canine->id }}</td>
                                    <td class="py-1 px-2 border border-indigo-300"><a href="{{ route('canines.show', $canine) }}">{{ $canine->name }}</a></td>
                                    <td class="py-1 px-2 border border-indigo-300">{{ $canine->breed }}</td>
                                    <td class="py-1 px-2 border border-indigo-300">{{ $canine->gender }} <span class="text-2xl">&{{ $canine->gender }};</span></td>
                                    <td class="py-1 px-2 border border-indigo-300">
                                        @if ($canine->mixed)
                                        &check;
                                        @endif
                                    </td>
                                    <td class="py-1 px-2 border border-indigo-300">
                                        @if ($canine->active)
                                            &check;
                                        @endif
                                    </td>
                                    <td class="py-1 px-2 border border-indigo-300">
                                        <a href="{{ route('users.show', $canine->user->id) }}">{{ $canine->user->name }}</a>
                                    </td>
                                    <td class="py-1 px-2 border border-indigo-300">{{ $canine->created_at }}</td>
                                    <td class="py-1 px-2 border border-indigo-300">{{ $canine->updated_at }}</td>
                                    <td class="py-1 px-2 border border-indigo-300">
                                        <a href="{{ route('canines.edit', $canine) }}">
                                            <button class="p-2 rounded bg-green-500 hover:bg-green-600 text-gray-100 hover:text-gray-50 transition">EDIT</button>
                                        </a>
                                    </td>
                                    <td class="py-1 px-2 border border-indigo-300">
                                        <a href="{{ route('canines.destroy', $canine) }}">
                                            <button class="p-2 rounded bg-red-500 hover:bg-red-600 text-gray-100 hover:text-gray-50 transition">DELETE</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
            @foreach (Auth::user()->roles as $role)
                @if($role->name == "Admin")
                <div class="">
                    <a href="{{ route('canines.create') }}">
                        <button class="mt-2 py-1 px-3 text-gray-100 bg-blue-600 hover:bg-blue-700 hover:text-gray-50 rounded">
                            Register New Canine
                        </button>
                    </a>
                </div>
                @endif
            @endforeach
        </div>
    </div>

</x-app-layout>
