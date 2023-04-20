<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">

                <div class="flex justify-end p-2">
                    <a href="{{ route('admin.roles.create') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md hover:text-yellow-200 text-white">Create
                        Role</a>
                </div>

                <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
                    <div
                        class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
                        <table class="min-w-full">
                            <thead>
                                <tr>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                        Name</th>
                                    <th
                                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                                    </th>

                                </tr>
                            </thead>

                            <tbody class="bg-white">
                                @foreach ($roles as $role)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                                            <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full"
                                                        src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80"
                                                        alt="" />
                                                </div>

                                                <div class="ml-4">
                                                    <div class="text-sm leading-5 font-medium text-gray-900">
                                                        {{ $role->name }}
                                                    </div>
                                                    <div class="text-sm leading-5 text-gray-500">
                                                        {{ Auth::user()->email }}</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td
                                            class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                                            <div class="flex space-x-2 justify-end">
                                                <a href="{{ route('admin.roles.edit', $role->id) }}"
                                                    class="px-4 py-2 bg-blue-500 text-white hover:bg-blue-900 rounded-md">Edit</a>

                                                {{-- <a href="{{ route('admin.roles.destroy', $role->id) }}"
                                                    class="px-4 py-2 bg-red-500 text-white  hover:bg-red-900 rounded-md">Delete</a> --}}

                                                <form
                                                    class="px-4 py-2 bg-red-500 text-white  hover:bg-red-900 rounded-md"
                                                    action="{{ route('admin.roles.destroy', $role->id) }}"
                                                    method="POST" onsubmit="return confirm('are you sure?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-admin-layout>
