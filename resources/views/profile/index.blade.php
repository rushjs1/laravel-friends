<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @auth

                    @if(auth()->user()->id !== $user->id)

                    @if(auth()->user()->isFriendsWith($user))

                        <div class="space-x-2">
                            <span> You and {{ $user->name }} are friends. </span>
                            <form action="/friends/{{$user->id}}" method="POST" class="inline">
                                @csrf 
                                @method('DELETE')
                                <button type="submit" class="hover:underline hover:text-rose-500">
                                    Unfriend
                                </button>
                            </form>
                        </div>

                        @else

                        @if(auth()->user()->hasPendingFriendRequestFor($user))

                            <div class="space-x-1">
                            <span>
                            Waiting for {{ $user->name }} to accept your friend request.
                            </span> 
                            <form action="{{ route('friends.destroy', $user) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button class="text-indigo-500">Cancel</button>
                            </form>
                            </div>

                            @elseif($user->hasPendingFriendRequestFor(auth()->user()))

                            <div class="flex justify-between items-center">
                                <span>
                                    {{ $user->name }} has sent you a friend request. 
                                </span>

                                <div class="space-x-2">
                                <form action="/friends/{{$user->id}}" method="POST" class="inline">
                                    @csrf 
                                    @method('PATCH')
                                    <button type="submit" class="hover:underline hover:text-green-500">Accept</button>
                                </form>

                                <form action="/friends/{{ $user->id}}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="hover:underline hover:text-rose-500">Reject</button>

                                </form>
                                </div>
                            
                            
                            </div>

                            @else

                            <form action="{{ route('friends.store', $user) }}" method="POST">
                                @csrf

                                <button class="font-semibold bg-gray-100 rounded-lg p-2 text-indigo-500 hover:bg-gray-200 shadow-sm">
                                    Add As Friend
                                </button>

                            </form>

                            @endif

                        @endif

                        @else
                         
                        <div>
                            <span>
                                Your Profile.
                            </span>
                        </div>

                        @endif

                    @endauth
                </div>
            </div>
        </div>
    </div>
</x-app-layout>