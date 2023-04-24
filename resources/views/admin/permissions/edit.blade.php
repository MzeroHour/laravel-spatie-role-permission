<x-admin-layout>
    <div class="py-12 w-full">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-2">

                <div class="flex p-2">
                    <a href="{{ route('admin.permissions.index') }}"
                        class="px-4 py-2 bg-green-700 hover:bg-green-500 rounded-md hover:text-yellow-200 text-white">Permission
                        Index
                    </a>
                </div>

                <div class="flex flex-col">
                    <form method="POST" action="{{ route('admin.permissions.update', $permission->id) }}">
                        @csrf
                        @method('PUT')
                        <div class="space-y-12">
                            <div class="border-b border-gray-900/10 pb-12">

                                <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                    <div class="sm:col-span-4">
                                        <label for="username"
                                            class="block text-sm font-medium leading-6 text-gray-900">Name</label>
                                        <div class="mt-2">
                                            <div
                                                class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                                                <input type="text" name="name" id="name" autocomplete="name"
                                                    class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"
                                                    value="{{ $permission->name }}">
                                            </div>
                                            @error('role')
                                                <span class="text-red-400 text-sm">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mt-6 flex items-center justify-end gap-x-6">
                            <button type="submit"
                                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
                        </div>
                    </form>

                </div>

                <div class="mt-2 p-2">
                    <h2 class="text-2xl font-semibold">Role</h2>
                    <div class="flex space-x-2 mt-4 pt-0">
                        @if ($permission->roles)
                            @foreach ($permission->roles as $permission_role)
                                <form class="px-4 py-2 bg-red-500 text-white  hover:bg-red-900 rounded-md"
                                    action="{{ route('admin.permissions.roles.remove', [$permission->id, $permission_role->id]) }}"
                                    method="POST" onsubmit="return confirm('are you sure?')">
                                    @csrf
                                    @method('DELETE')

                                    <button type="submit">{{ $permission_role->name }}</button>
                                </form>
                            @endforeach
                        @endif

                    </div>

                    <div class="flex flex-col mt-0">
                        <form method="POST" action="{{ route('admin.permissions.roles', $permission->id) }}">
                            @csrf
                            <div class="space-y-12">
                                <div class="border-b border-gray-900/10 pb-12">

                                    <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                                        <div class="sm:col-span-4">
                                            <label for="role"
                                                class="block text-sm font-medium leading-6 text-gray-900">Role</label>
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
            </div>
        </div>
</x-admin-layout>
