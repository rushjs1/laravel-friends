<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class ProfileIndexController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    public function __invoke(User $user)
    {
        return view('profile.index',[
            'user' => $user
        ]);
    }
}
