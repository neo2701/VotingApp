<x-election-layout>


    <div class="pt-2 flex flex-col align-middle justify-center items-center p-20">

        <div class="w-full mt-2 mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mt-2">
                {{-- Thankyou for voting --}}
                <div class="p-6 bg-white">
                    <div class="text-center">
                        <div class="text-2xl font-bold">
                            Thank you for voting at {{ $election->title }}!
                        </div>
                        <div class="text-xl">
                            You will be redirected in <span id="countdown">20</span> seconds.
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($election->banner_image)
            <div class="w-full mt-2 mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <img src="{{ asset($election->banner_image) }}" alt="banner image" class="w-full">
                    </div>
                </div>
            </div>
        @endif
    </div>

    <script>
        var timeleft = 20;
        var redirectTimer = setInterval(function() {
            if (timeleft <= 0) {
                clearInterval(redirectTimer);
                window.location.href = "{{ route('election.show', $election->id) }}";
            }
            document.getElementById("countdown").textContent = timeleft;
            timeleft -= 1;
        }, 1000);
    </script>
</x-election-layout>
