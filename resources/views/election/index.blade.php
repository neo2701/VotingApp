<x-election-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            @if (isset($header))
                {{ $header }}
            @else
                {{ 'Election' }}
            @endif

        </h2>
    </x-slot>

    <div class="py-12">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Welcome, {{ auth()->user()->name }}!
                </div>
            </div>
        </div> --}}
        <div class="max-w-7xl mt-2 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white text-center text-lg font-bold">
                    Current Election
                </div>

                <div class="p-5">
                    <table class="w-full table-auto flex-auto text-center">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">Election Name</th>
                                <th class="border px-4 py-2">Start Date</th>
                                <th class="border px-4 py-2">End Date</th>
                                <th class="border px-4 py-2">Status</th>
                                <th class="border px-4 py-2">Action</th>
                            </tr>
                        </thead>
                        @php
                            // dd($elections);
                        @endphp
                        <tbody>
                            @foreach ($elections as $election)
                                @php
                                    // dd($election->status);
                                    // dd($election);
                                @endphp
                                <tr>
                                    <td class="border px-4 py-2">{{ $election->title }}</td>
                                    <td class="border px-4 py-2">{{ $election->starts_at }}</td>
                                    <td class="border px-4 py-2">{{ $election->ends_at }}</td>
                                    <td class="border px-4 py-2">{{ $election->status }}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('election.show', $election->id) }}"
                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-election-layout>
