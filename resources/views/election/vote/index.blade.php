<x-election-layout>


    <div class="py-2">
        {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    Welcome, {{ auth()->user()->name }}!
                </div>
            </div>
        </div> --}}

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
                    <a href="{{ route('election.show', $election) }}">{{ $election->title }}</a>
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




                            <form action="{{ route('election.vote.store', $election->id) }}" method="POST">
                                @method('post')
                                @csrf
                                <div class="font-bold text-lg mt-2">
                                    {{-- {{ $position->name }} --}}
                                </div>
                                <input type="hidden" name="position" value="{{ $position->id }}">
                                <div class="grid md:grid-flow-col gap-3 sm:grid-flow-row mt-4">
                                    @foreach ($position->candidates as $candidate)
                                        <div class="card   bg-white  shadow-xl hover:shadow">
                                            <label for="rad{{ $candidate->id }}">
                                                <img class="w-32 mx-auto rounded-full border-8 border-white"
                                                    src="{{ asset($candidate->image) }}" alt="">
                                                <div class="text-center mt-2 text-3xl font-medium">
                                                    {{ $candidate->name }}
                                                </div>
                                                {{-- <div class="text-center mt-2 font-light text-sm">@devpenzil</div> --}}
                                                {{-- <div class="text-center font-normal text-lg">Kerala</div> --}}

                                                <hr class="mt-8">
                                                <div class="flex p-4  place-content-center	">
                                                    <div class="text-center">
                                                        <!-- Code block starts -->
                                                        <div class="flex items-center">
                                                            <div
                                                                class="bg-white dark:bg-gray-100 rounded-full w-4 h-4 flex flex-shrink-0 justify-center items-center relative">

                                                                <input aria-labelledby="rad{{ $candidate->id }}"
                                                                    value="{{ $candidate->id }}" type="radio"
                                                                    name="candidate" id="rad{{ $candidate->id }}"
                                                                    class="checkbox appearance-none focus:opacity-100 focus:ring-2 focus:ring-offset-2 focus:ring-indigo-700 focus:outline-none border rounded-full border-gray-400 absolute cursor-pointer w-full h-full checked:border-none"
                                                                    required />
                                                                <div
                                                                    class="check-icon hidden border-4 border-indigo-700 rounded-full w-full h-full z-1">
                                                                </div>
                                                            </div>
                                                            <span
                                                                class="ml-2 text-sm leading-4 font-normal text-gray-800 ">
                                                                Choose
                                                                {{ $candidate->name }}
                                                            </span>
                                            </label>
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
            </form>
            @endforeach

            {{-- button for vote --}}
        </div>
    </div>
    </div>
    </div>
</x-election-layout>
