<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form
                        action="{{ route('admin.positions.update', $position) }}"
                        method="post"
                    >
                        @method('put')
                        @csrf
                        <div>
                            <x-input-label
                                for="name"
                                value="Name"
                            />
                            <x-text-input
                                class="block w-full mt-1"
                                id="name"
                                name="name"
                                type="text"
                                value="{{ old('name', $position->name) }}"
                                required
                                x-ref="name"
                                placeholder="Position Name"
                                autocomplete="off"
                            />
                            <x-input-error
                                class="mt-2"
                                :messages="$errors->get('name')"
                            />
                        </div>
                        <div class="mt-4 flex justify-end gap-2">
                            {{-- Return --}}
                            <a
                                class="inline-flex items-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs uppercase tracking-widest hover:bg-gray-200 active:bg-gray-400 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                href="{{ route('admin.positions.index') }}"
                            >
                                Back
                            </a>

                            <x-primary-button type="submit">
                                Update Position
                            </x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
