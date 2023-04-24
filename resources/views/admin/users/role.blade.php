<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">

                <div class="flex p-2">
                    <a href="{{ route('admin.users.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md hover:text-yellow-200 text-white">User
                        Index
                    </a>
                </div>

                <div class="flex flex-col p-2 bg-slate-100">
                    <div>User Name: {{ $user->name }}</div>
                    <div>User Email: {{ $user->email }}</div>

                    <div class="mt-2 p-2 bg-slate-100">
                        <h2 class="text-2xl font-semibold">User Roles</h2>
                        <div class="flex space-x-2 mt-4 pt-0">
                            @if ($user->roles)
                                @foreach ($user->roles as $user_role)
                                    <form class="px-4 py-2 bg-red-500 text-white  hover:bg-red-900 rounded-md"
                                        action="{{ route('admin.users.roles.remove', [$user->id, $user_role->id]) }}"
                                        method="POST" onsubmit="return confirm('are you sure?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit">{{ $user_role->name }}</button>
                                    </form>
                                @endforeach
                            @endif

                        </div>

                        <div class="flex flex-col mt-0">
                            <form method="POST" action="{{ route('admin.users.roles', $user->id) }}">
                                @csrf
                                <div class="space-y-12">
                                    <div class="border-b border-gray-900/10 pb-12">

                                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                            <div class="sm:col-span-4">
                                                <label for="role"
                                                    class="block text-sm font-medium leading-6 text-gray-900">
                                                    Roles</label>
                                                <div class="mt-2">
                                                    <select id="role" name="role" autocomplete="role-name"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                        @foreach ($roles as $role)
                                                            <option value="{{ $role->name }}">{{ $role->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-6 flex items-center justify-end gap-x-6">
                                    <button type="submit"
                                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Assign</button>
                                </div>
                            </form>
                        </div>

                    </div>

                    <div class="mt-2 p-2 bg-slate-100">
                        <h2 class="text-2xl font-semibold">User Permissions</h2>
                        <div class="flex space-x-2 mt-4 pt-0">
                            @if ($user->permissions)
                                @foreach ($user->permissions as $user_permission)
                                    <form class="px-4 py-2 bg-red-500 text-white  hover:bg-red-900 rounded-md"
                                        action="{{ route('admin.users.permissions.revoke', [$user->id, $user_permission->id]) }}"
                                        method="POST" onsubmit="return confirm('are you sure?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit">{{ $user_permission->name }}</button>
                                    </form>
                                @endforeach
                            @endif

                        </div>

                        <div class="flex flex-col mt-0">
                            <form method="POST" action="{{ route('admin.users.permissions', $user->id) }}">
                                @csrf
                                <div class="space-y-12">
                                    <div class="border-b border-gray-900/10 pb-12">

                                        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                            <div class="sm:col-span-4">
                                                <label for="permission"
                                                    class="block text-sm font-medium leading-6 text-gray-900">Permission</label>
                                                <div class="mt-2">
                                                    <select id="permission" name="permission"
                                                        autocomplete="permission-name"
                                                        class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:max-w-xs sm:text-sm sm:leading-6">
                                                        @foreach ($permissions as $permission)
                                                            <option value="{{ $permission->name }}">
                                                                {{ $permission->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="mt-6 flex items-center justify-end gap-x-6">
                                    <button type="submit"
                                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Assign</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>


            </div>
        </div>
    </div>
</x-admin-layout>
