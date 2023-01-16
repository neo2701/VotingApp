<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Candidates') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    {{-- Content --}}
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
                        <a class="inline-flex text-center items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 focus:border-gray-900 focus:outline-none focus:ring active:bg-gray-900 disabled:opacity-25"
                            href="{{ route('admin.candidates.create') }}">
                            Create Candidate
                        </a>
                    </div>

                    {{-- Table --}}
                    <div class="mt-4">
                        <table class="w-full table-auto flex-auto text-center">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Position</th>
                                    <th class="px-4 py-2">Description</th>
                                    <th class="px-4 py-2">Election</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($candidates as $candidate)
                                    <tr>
                                        <td class="border px-4 py-2">{{ $candidate->name }}</td>
                                        <td class="border px-4 py-2">{{ $candidate->position->name }}</td>
                                        <td class="border px-4 py-2">{{ $candidate->description }}</td>
                                        <td class="border px-4 py-2">{{ $candidate->election->title }}</td>
                                        <td class="border px-4 py-2 ">
                                            <a class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 focus:border-gray-900 focus:outline-none focus:ring active:bg-gray-900 disabled:opacity-25"
                                                href="{{ route('admin.candidates.edit', $candidate) }}">
                                                Edit
                                            </a>
                                            <form class="inline-block"
                                                action="{{ route('admin.candidates.destroy', $candidate) }}"
                                                method="POST" onsubmit="return confirm('Are you sure?');">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    class="inline-flex items-center rounded-md border border-transparent bg-gray-800 px-4 py-2 text-xs font-semibold uppercase tracking-widest text-white ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 focus:border-gray-900 focus:outline-none focus:ring active:bg-gray-900 disabled:opacity-25"
                                                    type="submit">
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
