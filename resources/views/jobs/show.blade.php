<x-layout>
    <x-slot:heading> 
        Job Page
    </x-slot:heading>
   <h2><strong> {{ $job['title'] }}</strong></h2>
    <p>{{$job['company']}} at {{$job['location']}}</p>
    <p class="mt-6">
        <x-button href="/jobs">
            Edit Job
        </x-button>
    </p>
   
</x-layout>