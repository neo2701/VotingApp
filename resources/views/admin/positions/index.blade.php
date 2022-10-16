<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Positions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    <div class="flex justify-end">
                        <div x-data="{ open: @js($errors->create_position->any()) }">
                            <x-primary-button
                                type="button"
                                x-on:click="open=true;$nextTick(() => $refs.name.focus())"
                            >
                                Create Position
                            </x-primary-button>
                            <template x-teleport="body">
                                <div
                                    class="fixed inset-0 z-50 flex h-full w-full items-center justify-center bg-slate-400/50 backdrop-blur transition duration-300 ease-in-out"
                                    id="create-position"
                                    x-show="open"
                                    x-transition
                                >
                                    <div
                                        class="w-full max-w-lg rounded-md border bg-white px-4 py-6 shadow-md"
                                        x-on:click.outside="open=false;"
                                    >
                                        <span class="text-2xl font-semibold">Create Position</span>
                                        <div class="mt-4">
                                            <form
                                                action="{{ route('admin.positions.store') }}"
                                                method="post"
                                            >
                                                @csrf
                                                <div>
                                                    <x-input-label
                                                        for="name"
                                                        value="Name"
                                                    />
                                                    <x-text-input
                                                        class="mt-1 block w-full"
                                                        id="name"
                                                        name="name"
                                                        type="text"
                                                        required
                                                        x-ref="name"
                                                        placeholder="Position Name"
                                                        autocomplete="off"
                                                    />
                                                    <x-input-error
                                                        class="mt-2"
                                                        :messages="$errors->create_position->get('name')"
                                                    />
                                                </div>
                                                <div class="mt-4 flex items-center justify-end gap-2">
                                                    <a
                                                        class="inline-flex items-center rounded-md border border-transparent px-4 py-2 text-xs font-semibold uppercase tracking-widest ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-200 focus:border-gray-900 focus:outline-none focus:ring active:bg-gray-400 disabled:opacity-25"
                                                        href="#"
                                                        x-on:click.prevent="open=false"
                                                    >
                                                        Cancel
                                                    </a>
                                                    <x-primary-button type="submit">
                                                        Create
                                                    </x-primary-button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>

                    <div class="mt-4">
                        <table class="w-full table-fixed border-collapse">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 w-4/6">Name</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($positions as $position)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $position->name }}</td>
                                        <td class="border px-4 py-2 whitespace-nowrap">
                                            <div class="flex flex-row gap-2">
                                                <a
                                                    class="inline-block rounded bg-blue-500 p-2 font-bold text-white hover:bg-blue-700"
                                                    href="{{ route('admin.positions.edit', $position) }}"
                                                >
                                                    <svg
                                                        class="h-5 w-5"
                                                        xmlns="http://www.w3.org/2000/svg"
                                                        viewBox="0 0 20 20"
                                                        fill="currentColor"
                                                    >
                                                        <path
                                                            d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z"
                                                        />
                                                        <path
                                                            d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z"
                                                        />
                                                    </svg>
                                                </a>
                                                <form
                                                    class="inline-block"
                                                    action="{{ route('admin.positions.destroy', $position) }}"
                                                    method="POST"
                                                >
                                                    @csrf
                                                    @method('DELETE')
                                                    <button
                                                        class="rounded bg-red-600 p-2 font-bold text-white hover:bg-red-700"
                                                        type="submit"
                                                    >
                                                        <svg
                                                            class="h-5 w-5"
                                                            xmlns="http://www.w3.org/2000/svg"
                                                            viewBox="0 0 20 20"
                                                            fill="currentColor"
                                                        >
                                                            <path
                                                                fill-rule="evenodd"
                                                                d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                                                clip-rule="evenodd"
                                                            />
                                                        </svg>

                                                    </button>
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
