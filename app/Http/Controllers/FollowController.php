<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class FollowController extends Controller
{
    public function followUnfollow(Request $request)
    {
        $followerId = User::find(auth()->user()->id);
        $followingId = User::find($request->userId);
        $followerId->following()->toggle($followingId);
        dd($followingId->all());

        return redirect()->back();
    }
}
