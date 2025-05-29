<x-layout>
    <x-slot:heading> 
        Job Page
    </x-slot:heading>
   <h2><strong> {{ $job['title'] }}</strong></h2>
    <p>{{$job['company']}} at {{$job['location']}}</p>
   
</x-layout>