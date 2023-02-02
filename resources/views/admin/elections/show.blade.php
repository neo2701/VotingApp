<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="max-w-7xl mt-2 mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white text-center text-lg font-bold">
                {{ $election->title }}
            </div>

        </div>

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
            <div class="p-6 bg-white">
                <div class="text-center">
                    <div class="text-2xl font-bold">
                        Candidates
                    </div>
                    <hr class="mt-2">
                    {{-- foreach positions --}}
                    @foreach ($election->positions as $position)
                        {{-- foreach candidates --}}





                        <div class="font-bold text-lg mt-2">
                            {{ $position->name }}
                        </div>
                        <div class="grid md:grid-flow-col gap-3 sm:grid-flow-row mt-4">
                            @foreach ($position->candidates as $candidate)
                                <div class="card   bg-white  shadow-xl hover:shadow">

                                    <img class="w-32 mx-auto rounded-full border-8 border-white"
                                        src="{{ asset($candidate->image) }}" alt="">
                                    <div class="text-center mt-2 text-3xl font-medium">
                                        {{ $candidate->name }}
                                    </div>
                                    {{-- <div class="text-center mt-2 font-light text-sm">@devpenzil</div> --}}
                                    {{-- <div class="text-center font-normal text-lg">Kerala</div> --}}

                                    <hr class="mt-8">
                                    <div class="flex p-2  place-content-center	">
                                        <div class="text-center">
                                            <!-- Code block starts -->
                                            <div class="flex items-center">

                                                <span class="ml-2 text-sm leading-4 font-normal text-gray-800 ">
                                                    Total Votes : {{ $candidate->votes->count() }}
                                                </span>

                                            </div>
                                            <!-- Code block ends -->


                                        </div>

                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="mt-4">
                            <button class="bg-gray-500 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded-full"
                                type="submit">Vote</button>
                        </div>
                    @endforeach

                    {{-- button for vote --}}
                </div>
</x-admin-layout>
