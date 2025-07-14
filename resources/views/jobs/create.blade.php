<x-layout>
    <x-slot:heading> 
        create job
    </x-slot:heading>
   <form method="POST" action="/jobs" class="space-y-8 divide-y divide-gray-900/10">
    @csrf
    <div class="space-y-12">
        <div class="border-b border-gray-900/10 pb-12">
            <h2 class="text-base/7 font-semibold text-gray-900">Create a new job</h2>
            <p class="mt-1 text-sm/6 text-gray-600">we just need a handel a job.</p>

            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-2">
                    <x-form-label for="title">Title</x-form-label>
                    <div class="mt-2">
                        <x-form-input type="text" name="title" id="title" placeholder="Job Title"  required></x-form-input>
                        <x-form-error name="title"></x-form-error>
                       
                    </div>
                </div>
            </div>
            <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
                <div class="sm:col-span-2">
                    <label for="salary" class="block text-sm/6 font-medium text-gray-900">Salrary</label>
                    <div class="mt-2">
                        <x-form-input type="text" name="salary" id="salary" inputmode="numeric" pattern="^[0-9]+$" placeholder="$50,000/year" required></x-form-input>
                        <x-from-error name="salary"></x-form-error> 
                    </div>
                </div>
            </div>
            {{-- @if ($errors->any())
                <div class="mt-4">
                    <ul class="list-disc pl-5 text-sm text-red-600">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                
            @endif --}}
        </div>
    </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
  </div>
</form>

</x-layout>