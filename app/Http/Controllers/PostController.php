<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\StoreFormRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::orderBy('id', 'DESC')->get();

        if ($request->has('user_id')) {
            $posts = Post::query()
                ->where('user_id', '=', $request->user_id)
                ->orderBy('id', 'DESC')
                ->get();
        }
        $i = 1;

        return view('cabinet.posts.index', compact('posts', 'i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cabinet.posts.create');
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFormRequest $request)
    {
        $data = $request->validated();

        /**
         * @var \App\Models\User $user
         */
        $user = auth('web')->user();
        $user->posts()->create($data);

        return redirect()->route('posts.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        if (Gate::denies('update-delete-post', [$post])) {
            return redirect()->route('posts.index');
        }

        return view('cabinet.posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreFormRequest $request, $id)
    {
        $post = Post::find($id);
        if (Gate::denies('update-delete-post', [
            $post
        ])) {
            return redirect()->route('posts.index');
        }
        $data = $request->validated();

        $post->update($data);

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if (Gate::denies('update-delete-post', [
            $post
        ])) {
            return redirect()->route('posts.index');
        }

        $post->delete();

        return redirect()->back();
    }
}
