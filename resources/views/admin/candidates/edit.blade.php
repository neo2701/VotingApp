<x-admin-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Edit Candidate') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="border-b border-gray-200 bg-white p-6">
                    <form action="{{ route('admin.candidates.update', $candidate) }}" method="POST">
                        @method('put')
                        @csrf
                        <div>
                            <x-input-label for="name" value="Name" />
                            <x-text-input class="mt-1 block w-full" id="name" name="name" type="text"
                                :value="old('name', $candidate->name)" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="position" value="Position" />
                            <select name="position" id="position"
                                class="block w-full px-4 py-3 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach ($positions as $position)
                                    <option value="{{ $position->id }}">{{ $position->name }}
                                        ({{ $position->election()->get()->first()->title }})
                                    </option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('position')" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="description" value="Description" />
                            <textarea
                                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                                id="description" name="description" rows="5">{{ old('description', $candidate->description) }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="election" value="Election" />
                            <select name="election" id="election"
                                class="block w-full px-4 py-3 rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach ($elections as $election)
                                    <option value="{{ $election->id }}">{{ $election->title }}</option>
                                @endforeach
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('election')" />
                        </div>
                        <div class="mt-4 flex justify-end">
                            <x-primary-button type="submit">
                                Update
                            </x-primary-button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</x-admin-layout>
