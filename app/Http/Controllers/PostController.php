<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(Request $request)
    {

        //$posts = Post::with(['user:id,name', 'categories:id,name'])->paginate(50);
//        $posts = Post::with([
//            'user:id,name',
//            'categories' => function(BelongsToMany $query){
//                $query->select(['id', 'name'])->where('name', 'like', '%at%');
//            }
//        ])->paginate(50);
        //$posts = Post::paginate(50);
        $currentPage = (int)$request->get('page', 1);
        $posts = \Cache::remember('posts_lists_page_' . $currentPage, now()->addMinutes(5), function () {
            return Post::with(['user:id,name', 'categories:id,name'])->paginate(50);
        });
        return view('post.index', compact('posts'));
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function show(Post $post)
    {

    }

    public function edit(Post $post)
    {

    }

    public function update(Request $request, Post $post)
    {

    }

    public function destroy(Post $post)
    {

    }
}
