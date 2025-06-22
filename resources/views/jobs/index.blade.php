<x-layout>
    <x-slot:heading> 
        Jobs Page
    </x-slot:heading>
    <div>
        @if (@session('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                <strong class="font-bold">Success!</strong>
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        @endif
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
                <p class="font-bold">Salary: ${{ $job['salary']}}</p>
            </div>
        @endforeach
        <div>
            {{ $jobs->links() }}
        </div>

    </div>
   
</x-layout>