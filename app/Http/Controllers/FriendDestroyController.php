<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FriendDestroyController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function __invoke(Request $request, User $user)
    {
        
        if($request->user()->friendsTo()->detach($user))
        {
            return back()->with('success', 'Friend request has been successfully cancelled.');
        }

        request()->user()->friendsFrom()->detach($user);

        return back()->with('success', 'Friend request has been successfully rejected.');
        
    }

}
