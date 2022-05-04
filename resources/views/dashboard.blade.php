<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
      
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="font-semibold mb-4">
            <h1>Whats Happening?</h1>
            </div>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 space-y-4  ">
                    @foreach($statuses as $status)
                    
                    <div class="grid grid-cols-12 rounded-lg bg-gray-100 p-4">
                      <span class="col-span-1">
                        <div class="flex-shrink-0">
                            <img class="rounded-full" src="https://i.pravatar.cc/120?u={{$status->user->id}}" width="60" height="60" class="rounded-full" alt="">
                        </div>
                      </span> 

                      <div class="col-span-11 flex flex-col">
                        <span class="font-semibold"> {{ $status->user->name }}</span>
                      
                        <span class="col-span-10">
                          {{ $status->body }}
                         </span> 
                      </div>
                    </div>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
