<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 space-y-4  ">
                    @foreach($statuses as $status)
                    
                    <div class="grid grid-cols-12 rounded-lg bg-gray-200 p-2 space-x-4">
                      <span class="col-span-2">
                      {{ $status->user->name }}:
                      </span> 
                      <span class="col-span-10">
                          {{ $status->body }}
                      </span> 
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
