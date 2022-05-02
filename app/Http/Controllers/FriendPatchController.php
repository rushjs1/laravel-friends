<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FriendPatchController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function __invoke(User $user, Request $request)
    {
        $request->user()->pendingFriendsFrom()->updateExistingPivot($user, [
            'accepted' => true
        ]);

        return back()->with('success', 'Successfully accepted friend request from ' . $user->name);
    }
}
