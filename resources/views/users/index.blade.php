<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('FTPTA Kennel') }} > Users
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (count($users) < 1)
                    <p>There are currently no users!
                    @else
                    <table>
                        <thead>
                            <tr>
                                <th class="p-1 border border-indigo-400">ID</th>
                                <th class="p-1 border border-indigo-400">NAME</th>
                                <th class="p-1 border border-indigo-400">EMAIL</th>
                                <th class="p-1 border border-indigo-400" colspan="3">ROLES</th>
                                <th class="p-1 border border-indigo-400">CREATED</th>
                                <th class="p-1 border border-indigo-400">UPDATED</th>
                                <th class="p-1 border border-indigo-400" colspan="2">ACTIONS</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr class="hover:bg-indigo-50 transition">
                                    <td class="py-1 px-2 border border-indigo-300">{{ $user->id }}</td>
                                    <td class="py-1 px-2 border border-indigo-300">
                                        <a href="{{ route('users.show', $user) }}">{{ $user->name }}</a>
                                    </td>
                                    <td class="py-1 px-2 border border-indigo-300">{{ $user->email }}</td>
                                    <td class="py-1 px-2 border border-indigo-300" colspan="3">
                                    @foreach ($roles as $role)
                                            <label for="{{ $role->name }}">{{ $role->name }}</label>
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
                                    </td>
                                    <td class="py-1 px-2 border border-indigo-300">{{$user->created_at }}</td>
                                    <td class="py-1 px-2 border border-indigo-300">{{$user->updated_at }}</td>
                                    <td class="py-1 px-2 border border-indigo-300">
                                        <a href="{{ route('users.edit', $user) }}">
                                            <button class="p-2 rounded bg-green-500 hover:bg-green-600 text-gray-100 hover:text-gray-50 transition">EDIT</button>
                                        </a>
                                    </td>
                                    <td class="py-1 px-2 border border-indigo-300">
                                        <a href="{{ route('users.destroy', $user) }}">
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
                    <a href="{{ route('createUser') }}">
                        <button class="mt-2 py-1 px-3 text-gray-100 bg-blue-600 hover:bg-blue-700 hover:text-gray-50 rounded">
                            Register New User
                        </button>
                    </a>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</x-app-layout>
