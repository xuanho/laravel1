<x-layout>
    <x-slot:heading> 
        Jobs Page
    </x-slot:heading>
    <div>
        @foreach ( $jobs as $job )
            <div class="job block px-4 py-6 border border-gray-200 mb-4 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300">
                <div class="text-black bold ">
                    <div class="text-yellow-500"> {{ $job->employer->name }}</div>
                    <a href="/jobs/{{ $job['id'] }}" class="text-blue-500 hover:underline">
                        <strong>{{ $job['title'] }}</strong> :
                    </a>
                    <span>
                        {{ $job['company'] }}
                    </span>
                </div>
                <p class="">Location: {{ $job['location'] }}</p>
            </div>
        @endforeach
        <div>
            {{ $jobs->links() }}
        </div>

    </div>
   
</x-layout>