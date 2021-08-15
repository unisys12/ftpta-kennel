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
                <td class="py-1 px-2 border border-indigo-300 text-center">{{ $canine->breed }}</td>
                <td class="py-1 px-2 border border-indigo-300 text-center">{{ $canine->gender }} <span class="text-2xl">&{{ $canine->gender }};</span></td>
                <td class="py-1 px-2 border border-indigo-300 text-center">
                    @if ($canine->mixed)
                    &check;
                    @endif
                </td>
                <td class="py-1 px-2 border border-indigo-300 text-center">
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
