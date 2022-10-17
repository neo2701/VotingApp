<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Create Election') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    <form
                        action="{{ route('admin.elections.store') }}"
                        method="POST"
                    >
                        @csrf
                        <div>
                            <x-input-label
                                for="title"
                                value="Title"
                            />
                            <x-text-input
                                class="mt-1 block w-full"
                                id="title"
                                name="title"
                                type="text"
                                :value="old('title')"
                                required
                                autofocus
                            />
                            <x-input-error
                                class="mt-2"
                                :messages="$errors->get('title')"
                            />
                        </div>
                        <div class="mt-4">
                            <x-input-label
                                for="description"
                                value="Description"
                            />
                            <textarea
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                id="description"
                                name="description"
                                rows="5"
                            >{{ old('description') }}</textarea>
                            <x-input-error
                                class="mt-2"
                                :messages="$errors->get('description')"
                            />
                        </div>
                        <div class="mt-4">
                            <x-input-label
                                for="starts_at"
                                value="Starts At"
                            />
                            <x-text-input
                                class="mt-1 block w-full"
                                id="starts_at"
                                name="starts_at"
                                type="datetime-local"
                                :value="old('starts_at')"
                                required
                            />
                            <x-input-error
                                class="mt-2"
                                :messages="$errors->get('starts_at')"
                            />
                        </div>
                        <div class="mt-4">
                            <x-input-label
                                for="ends_at"
                                value="Ends At"
                            />
                            <x-text-input
                                class="mt-1 block w-full"
                                id="ends_at"
                                name="ends_at"
                                type="datetime-local"
                                :value="old('ends_at')"
                                required
                            />
                            <x-input-error
                                class="mt-2"
                                :messages="$errors->get('ends_at')"
                            />
                            <div class="mt-4 flex justify-end">
                                <x-primary-button type="submit">
                                    Create
                                </x-primary-button>
                            </div>
                        </div>
                </div>
            </div>
        </div>
</x-admin-layout>
