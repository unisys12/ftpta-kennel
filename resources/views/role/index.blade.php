<x-app-layout>
    <x-slot name="header">
        <div class="text-sm breadcrumbs">
            <ul>
                <li><a href="{{ route('dashboard') }}">{{ __('FTPTA Kennel') }}</a></li>
                <li>Roles</li>
            </ul>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (count($roles) < 1)
                    <p>There are currently no roles!
                    @else
                    <table>
                        <thead>
                            <tr>
                                <th class="p-1 border border-indigo-400">ID</th>
                                <th class="p-1 border border-indigo-400">NAME</th>
                                <th class="p-1 border border-indigo-400">DESCRIPTION</th>
                                <th class="p-1 border border-indigo-400">CREATED</th>
                                <th class="p-1 border border-indigo-400">UPDATED</th>
                                <th class="p-1 border border-indigo-400" colspan="2">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr class="hover:bg-indigo-50">
                                    <td class="p-1 border border-indigo-300">{{ $role->id }}</td>
                                    <td class="p-1 border border-indigo-300">
                                        <a href="{{ route('roles.show', $role) }}">{{ $role->name }}</a>
                                    </td>
                                    <td class="p-1 border border-indigo-300">{{ $role->description }}</td>
                                    <td class="p-1 border border-indigo-300">{{ $role->created_at }}</td>
                                    <td class="p-1 border border-indigo-300">{{ $role->updated_at }}</td>
                                    <td class="p-1 border border-indigo-300">
                                        <a href="{{ route('roles.edit', $role) }}">
                                            <button class="p-2 rounded bg-green-500 hover:bg-green-600 text-gray-100 hover:text-gray-50">EDIT</button>
                                        </a>
                                    </td>
                                    <td class="p-1 border border-indigo-300">
                                        <a href="{{ route('roles.destroy', $role) }}">
                                            <button class="p-2 rounded bg-red-500 hover:bg-red-600 text-gray-100 hover:text-gray-50">DELETE</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
            <div class="">
                <a href="{{ route('roles.create') }}">
                    <button class="mt-2 py-1 px-3 text-gray-100 bg-blue-600 hover:bg-blue-700 hover:text-gray-50 rounded">
                        Add New Role
                    </button>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>
