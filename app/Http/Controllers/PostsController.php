<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        DB::enableQueryLog();

        return view(
            'posts.index', 
            ['posts' => BlogPost::withCount('comments')->get()]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:5|max:100',
            'content' => 'required|min:10',

        ]);

        $post = new BlogPost();
        $post->title = $request->input('title');
        $post->content = $request->input('content');

        $post->save();

        $request->session()->flash('status', 'blog post created');
        return redirect()->route('posts.show', ['post' => $post->id]);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //dd(BlogPost::findOrFail($id));
        return view('posts.show', ['post' => BlogPost::findOrFail($id)]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = BlogPost::findOrFail($id);
        
        return view('posts.edit', ['post'=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = BlogPost::findOrFail($id);
        $request->validate([
            'title' => 'required|min:5|max:100',
            'content' => 'required|min:10',

        ]);
        
        $post->title = $request->input('title');
        $post->content = $request->input('content');

        $post->save();

        $request->session()->flash('status', 'blog post Updated');
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
        $post = BlogPost::findOrFail($id);
        $post->delete();

        session()->flash('status', 'BlogPost deleted');

        return redirect()->route('posts.index');
    }
}
