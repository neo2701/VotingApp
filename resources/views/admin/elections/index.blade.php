<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Elections') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    {{-- Content --}}
                    <div class="flex justify-end">
                        <a
                            class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 focus:border-gray-900 focus:outline-none focus:ring active:bg-gray-900 disabled:opacity-25"
                            href="{{ route('admin.elections.create') }}"
                        >
                            Create Election
                        </a>
                    </div>
                    {{-- Table --}}
                    <div class="mt-4">
                        <table class="w-full table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Title</th>
                                    <th class="px-4 py-2">Start Date</th>
                                    <th class="px-4 py-2">End Date</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($elections as $election)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $election->title }}</td>
                                        <td class="border px-4 py-2">{{ $election->starts_at }}</td>
                                        <td class="border px-4 py-2">{{ $election->ends_at }}</td>
                                        <td class="border px-4 py-2">
                                            <a
                                                class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 focus:border-gray-900 focus:outline-none focus:ring active:bg-gray-900 disabled:opacity-25"
                                                href="{{ route('admin.elections.edit', $election) }}"
                                            >
                                                Edit
                                            </a>
                                            <form
                                                class="inline-block"
                                                action="{{ route('admin.elections.destroy', $election) }}"
                                                method="POST"
                                                onsubmit="return confirm('Are you sure?');"
                                            >
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 focus:border-gray-900 focus:outline-none focus:ring active:bg-gray-900 disabled:opacity-25"
                                                    type="submit"
                                                >
                                                    Delete
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</x-admin-layout>
