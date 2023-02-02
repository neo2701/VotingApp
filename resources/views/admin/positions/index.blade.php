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
                    {{-- Content here --}}
                    @if (session('success'))
                        <div class="mb-4 w-full rounded-md border border-green-600 bg-green-200 py-2 px-4">
                            <div class="flex flex-row items-center gap-4">
                                <svg class="h-5 w-5 fill-green-700" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path fill-rule="evenodd"
                                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a.75.75 0 000 1.5h.253a.25.25 0 01.244.304l-.459 2.066A1.75 1.75 0 0010.747 15H11a.75.75 0 000-1.5h-.253a.25.25 0 01-.244-.304l.459-2.066A1.75 1.75 0 009.253 9H9z"
                                        clip-rule="evenodd" />
                                </svg>

                                <span class="text-green-700">{{ session('success') }}</span>
                            </div>
                        </div>
                    @endif

                    <div class="flex justify-end">
                        <x-modal :open="$errors->create->any()">
                            <x-slot name="trigger">
                                <x-primary-button type="button">
                                    Create Position
                                </x-primary-button>
                            </x-slot>
                            <x-slot name="content">
                                <div class="w-full max-w-lg rounded-md border bg-white px-4 py-6 shadow-md">
                                    <span class="text-2xl font-semibold">Create Position</span>
                                    <div class="mt-4">
                                        <form action="{{ route('admin.positions.store') }}" method="post">
                                            @csrf
                                            <div>
                                                <x-input-label for="name" value="Name" />
                                                <x-text-input class="mt-1 block w-full" id="name" name="name"
                                                    type="text" value="{{ old('name') }}" required
                                                    placeholder="Position Name" autocomplete="off"
                                                    x-effect="whenOpen(() => $el.focus())" />
                                                <x-input-error class="mt-2" :messages="$errors->create->get('name')" />
                                            </div>
                                            <div class="mt-4">
                                                <x-input-label for="election" value="Election" />
                                                <select name="election_id" id="election"
                                                    class="block w-full px-4 py-3  rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                    @foreach ($elections as $election)
                                                        <option value="{{ $election->id }}">{{ $election->title }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                <x-input-error class="mt-2" :messages="$errors->get('position')" />
                                            </div>
                                            <div class="mt-4 flex items-center justify-end gap-2">
                                                <a class="inline-flex items-center rounded-md border border-transparent px-4 py-2 text-xs font-semibold uppercase tracking-widest ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-200 focus:outline-none focus:ring active:bg-gray-400 disabled:opacity-25"
                                                    href="#" x-on:click.prevent="hide()">
                                                    Cancel
                                                </a>
                                                <x-primary-button type="submit">
                                                    Create
                                                </x-primary-button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </x-slot>
                        </x-modal>
                    </div>
                    <div class="mt-4">
                        <table class="w-full table-fixed border-collapse ">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Election</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>



                                @foreach ($positions as $position)
                                    <tr class="text-center align-center">
                                        <td class="border px-4 py-2">{{ $position->name }}</td>
                                        <td class="border px-4 py-2">{{ $position->election->title }}</td>
                                        <td class="whitespace-nowrap border px-4 py-2">
                                            <div class="flex flex-row gap-2">
                                                {{-- Edit Action --}}
                                                <x-modal :open="$errors->getBag('edit.' . $position->id)->any()">
                                                    <x-slot name="trigger">
                                                        <button
                                                            class="inline-flex items-center rounded-md border border-transparent bg-blue-600 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white ring-blue-300 transition duration-150 ease-in-out hover:bg-blue-700 focus:border-blue-900 focus:outline-none focus:ring active:bg-blue-900 disabled:opacity-25"
                                                            type="button">
                                                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 20 20" fill="currentColor">
                                                                <path
                                                                    d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                                                <path
                                                                    d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                                                            </svg>
                                                        </button>
                                                    </x-slot>
                                                    <x-slot name="content">
                                                        <div
                                                            class="w-full max-w-lg rounded-md border bg-white px-4 py-6 shadow-md">
                                                            <span class="text-2xl font-semibold">Update
                                                                Position</span>
                                                            <div class="mt-4">
                                                                <form
                                                                    action="{{ route('admin.positions.update', $position) }}"
                                                                    method="post">
                                                                    @method('put')
                                                                    @csrf
                                                                    <div>
                                                                        <x-input-label for="name" value="Name" />
                                                                        <x-text-input class="mt-1 block w-full"
                                                                            id="name" name="name" type="text"
                                                                            value="{{ $position->name }}" required
                                                                            placeholder="Position Name"
                                                                            autocomplete="off"
                                                                            x-effect="whenOpen(() => $el.focus())" />
                                                                        <x-input-error class="mt-2"
                                                                            :messages="$errors
                                                                                ->getBag('edit.' . $position->id)
                                                                                ->get('name')" />
                                                                    </div>
                                                                    <div class="mt-4">
                                                                        <x-input-label for="election"
                                                                            value="Election" />
                                                                        <select name="election_id" id="election"
                                                                            class="block w-full px-4 py-3  rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                                                            @foreach ($elections as $election)
                                                                                <option
                                                                                    @php
if ($election->id == $position->election_id) {
                                                                                        echo 'selected="selected"';
                                                                                    } @endphp
                                                                                    value="{{ $election->id }}">
                                                                                    {{ $election->title }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        <x-input-error class="mt-2"
                                                                            :messages="$errors->get('position')" />
                                                                    </div>
                                                                    <div
                                                                        class="mt-4 flex items-center justify-end gap-2">
                                                                        <a class="inline-flex items-center rounded-md border border-transparent px-4 py-2 text-xs font-semibold uppercase tracking-widest ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-200 focus:outline-none focus:ring active:bg-gray-400 disabled:opacity-25"
                                                                            href="#" x-on:click.prevent="hide()">
                                                                            Cancel
                                                                        </a>
                                                                        <x-primary-button type="submit">
                                                                            Update
                                                                        </x-primary-button>
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </x-slot>
                                                </x-modal>
                                                {{-- Delete Action --}}
                                                <x-modal>
                                                    <x-slot name="trigger">
                                                        <x-danger-button type="button">
                                                            <svg class="h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                                                viewBox="0 0 20 20" fill="currentColor">
                                                                <path fill-rule="evenodd"
                                                                    d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z"
                                                                    clip-rule="evenodd" />
                                                            </svg>

                                                        </x-danger-button>
                                                    </x-slot>

                                                    <x-slot name="content">
                                                        <div
                                                            class="w-full max-w-md rounded-md border bg-white p-6 shadow-md">
                                                            <span class="text-xl font-semibold">Are you sure you
                                                                want to
                                                                delete this position?
                                                            </span>

                                                            <div class="mt-4">
                                                                <ul class="list-inside list-disc text-red-600">
                                                                    <li>
                                                                        You are about to delete position
                                                                        <span
                                                                            class="underline underline-offset-2">{{ $position->name }}</span>.
                                                                    </li>
                                                                    <li>
                                                                        This action is irreversible.
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                            <form
                                                                action="{{ route('admin.positions.destroy', $position) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('delete')

                                                                <div class="mt-4 flex justify-end gap-2">
                                                                    <!-- cancel button -->
                                                                    <button
                                                                        class="inline-flex items-center rounded-md border border-transparent px-4 py-2 text-xs font-semibold uppercase tracking-widest ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-200 focus:outline-none focus:ring active:bg-gray-400 disabled:opacity-25"
                                                                        x-on:click.prevent="hide()">
                                                                        Cancel
                                                                    </button>

                                                                    <x-danger-button>
                                                                        Confirm
                                                                    </x-danger-button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </x-slot>
                                                </x-modal>

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
