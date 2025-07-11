<x-layout>
    <x-slot:heading> 
        Edit job: {{ $job->title }}
    </x-slot:heading>
   <form method="POST" action="/jobs/{{$job->id}}" class="space-y-8 divide-y divide-gray-900/10">
    @csrf
    @method('PATCH')
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-2">
                    <label for="title" class="block text-sm/6 font-medium text-gray-900">Title</label>
                    <div class="mt-2">
                        <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                            <input type="text" name="title" value="{{$job->title ? $job->title : '' }}" id="title" class="block min-w-0 grow py-1.5 pr-3 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="Job Title"  required/>
                        </div>
                        @error('title')
                            <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>
                            
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-2">
                    <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salrary</label>
                    <div class="mt-2">
                        <div class="flex items-center rounded-md bg-white pl-3 outline-1 -outline-offset-1 outline-gray-300 focus-within:outline-2 focus-within:-outline-offset-2 focus-within:outline-indigo-600">
                            <input type="text"value="{{$job->salary ? $job->salary : '' }}"   name="salary"  id="salary" class="block min-w-0 grow py-1.5 pr-3 px-3 text-base text-gray-900 placeholder:text-gray-400 focus:outline-none sm:text-sm/6" placeholder="$50,000/year" required   />
                        </div>
                         @error('salary')
                            <p class="mt-2 text-sm/6 text-red-600">{{ $message }}</p>
                            
                        @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>

  <div class="mt-6 flex items-center justify-between gap-x-6">
    <div class="flex items-center gap-x-4">
        <button form="form-delete" class="bg-red-600 text-white hover:bg-indigo-500 px-3 py-2 rounded-md">Delete</button>
    </div>
    <div class="flex items-center gap-x-4">
        <a href="/jobs/{{ $job->id}}" type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</a>
        <div>
            <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Update</button>
        </div>
    </div>
  </div>
</form>

<form method="POST" action="/jobs/{{$job->id}}" class="hidden" id="form-delete">
    {{-- This form is used to delete the job --}}
    {{-- We use a hidden form to submit a DELETE request --}}
    {{-- The method is set to DELETE and we include a CSRF token for security --}}
    @csrf
    @method('DELETE')
</x-layout>