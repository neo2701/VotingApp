<x-election-layout>


    <div class="py-2">

        {{-- show flash message --}}
        @if (session('success'))
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-green-200 border-b border-gray-200 text">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Welcome, {{ auth()->user()->name }}!
                </div>
            </div>
        </div> --}}{{-- banner image --}}
        @if ($election->banner_image)
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <img src="{{ asset($election->banner_image) }}" alt="banner image" class="w-full">
                    </div>
                </div>
            </div>
        @endif
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
                            <div class="font-bold text-lg mt-2">
                                {{ $position->name }}
                            </div>

                            {{-- foreach candidates --}}
                            <div class="grid md:grid-flow-col gap-3 sm:grid-flow-row mt-4">
                                @foreach ($position->candidates as $candidate)
                                    <div class="card  bg-white  shadow-xl hover:shadow">
                                        <img class="w-32 mx-auto rounded-full border-8 border-white"
                                            src="{{ asset($candidate->image) }}" alt="">
                                        <div class="text-center mt-2 text-3xl font-medium">{{ $candidate->name }}
                                        </div>
                                        {{-- <div class="text-center mt-2 font-light text-sm">@devpenzil</div> --}}
                                        {{-- <div class="text-center font-normal text-lg">Kerala</div> --}}
                                        <div class="px-6 text-justify mt-2 font-light text-sm">

                                            <p>
                                                {!! nl2br($candidate->description) !!}
                                            </p>

                                        </div>

                                        {{-- <div class="flex p-4  place-content-center	">
                                            <div class="text-center">
                                                <span class="font-bold">1.8 k</span> Followers
                                            </div>

                                        </div> --}}
                                    </div>
                                @endforeach
                            </div>
                        @endforeach

                        {{-- button for vote --}}
                        <div class="mt-8">
                            <a href="{{ route('election.vote', $election->id) }}"
                                class="bg-gray-500 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded-full">Vote
                                Here</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</x-election-layout>
