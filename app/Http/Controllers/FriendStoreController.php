<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FriendStoreController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function __invoke(User $user, Request $request)
    {
        if($request->user()->id === $user->id){
            return back()->with('error', 'You can not friend yourself.');
        }

        if($request->user()->friends->contains($user))
        {
            return back('error', 'You are already friends with ' . $user->name );
        }


        if($request->user()->hasPendingFriendRequestFor($user)){
            return back()->with('error', 'Friend request has already been sent.');
        }


        $request->user()->pendingFriendsTo()->attach($user);

        return back()->with('success', 'Successfully sent friend request.');
    }
}
