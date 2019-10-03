<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        $users = User
            ::addSelect([
                'last_post' => Post::select('title')
                    ->whereColumn('user_id', 'users.id')
                    ->orderBy('created_at', 'desc')
                    ->limit(1)
            ])
            ->withCount('posts')
            ->paginate(50);
        return view('user.index', compact('users'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        //
    }


    public function update(Request $request, User $user)
    {
        //
    }


    public function destroy(User $user)
    {
        //
    }
}
