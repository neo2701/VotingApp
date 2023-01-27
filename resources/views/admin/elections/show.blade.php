<x-admin-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        <div class="grid ">
            <div class="flex justify-center">
                <div class="stats shadow">
                    <div class="stat">
                        <div class="stat-figure text-secondary inline-block w-10 h-10 stroke-current">
                            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000"
                                stroke-width="2">
                                <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                                <g id="SVGRepo_iconCarrier">
                                    <path
                                        d="M16 8C16 10.2091 14.2091 12 12 12C9.79086 12 8 10.2091 8 8C8 5.79086 9.79086 4 12 4C14.2091 4 16 5.79086 16 8Z"
                                        stroke="#464455" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path
                                        d="M14.6824 14H9.31765C8.83513 14 8.59387 14 8.37806 14.0461C7.63116 14.2056 6.9853 14.7661 6.62346 15.569C6.51891 15.8009 6.44262 16.0765 6.29003 16.6278C6.10668 17.2901 6.01501 17.6213 6.00261 17.8884C5.95888 18.8308 6.46818 19.6817 7.22441 19.9297C7.43875 20 7.72864 20 8.30844 20H15.6916C16.2714 20 16.5613 20 16.7756 19.9297C17.5318 19.6817 18.0411 18.8308 17.9974 17.8884C17.985 17.6213 17.8933 17.2901 17.71 16.6278C17.5574 16.0765 17.4811 15.8009 17.3765 15.569C17.0147 14.7661 16.3688 14.2056 15.6219 14.0461C15.4061 14 15.1649 14 14.6824 14Z"
                                        stroke="#464455" stroke-linecap="round" stroke-linejoin="round"></path>
                                </g>
                            </svg>
                        </div>
                        <div class="stat-title">Registered Voters</div>
                        <div class="stat-value">{{ count($election->voters) }}</div>
                        {{-- <div class="stat-desc">21% more than last month</div> --}}
                    </div>
                    <div class="stat">
                        <div class="stat-figure text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block w-8 h-8 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="stat-title">Total Voters</div>
                        <div class="stat-value">89,400</div>
                        {{-- <div class="stat-desc">21% more than last month</div> --}}
                    </div>
                    <div class="stat">
                        <div class="stat-figure text-secondary">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                class="inline-block w-8 h-8 stroke-current">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="stat-title">Total Voters</div>
                        <div class="stat-value">89,400</div>
                        {{-- <div class="stat-desc">21% more than last month</div> --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-admin-layout>
