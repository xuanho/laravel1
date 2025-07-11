<x-layout>
    <x-slot:heading> 
        Job Page
    </x-slot:heading>
   <h2><strong> {{ $job['title'] }}</strong></h2>
    <p>{{$job['company']}} at {{$job['location']}}</p>
    <p>Salary: ${{$job['salary']}}</p>
    <p class="mt-6">
        <x-button href="/jobs/{{ $job['id'] }}/edit" >
            Edit Job
        </x-button>
    </p>
   
</x-layout> 