<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

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
            [
                'posts' => BlogPost::srt()->withCount('comments')->get(),
                'most_commented' => BlogPost::mostCommented()->take(5)->get(),
                'most_active_users' => User::mostActive()->take(5)->get(),
            
            ] // local query scope
            // for global query scope
            // ['posts' => BlogPost::withCount('comments')->get()]
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
        $post->user_id = Auth::user()->id;
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
        /* return view('posts.show', ['post' => BlogPost::with(['comments' => function($query) {
            return $query->srt();
        }])->findOrFail($id)]); */
        
        // globle query scope
        return view('posts.show', ['post' => BlogPost::with('comments')->findOrFail($id)]);  // added local scope in blogpost model 

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
        
        /* if (Gate::denies('update-post', $post))
            abort(403, "You can't edit this blogpost"); */

        //short hand for Gate denies 
        $this->authorize('update-post', $post);

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
        if (Gate::denies('update-post', $post))
            abort(403, "You can't edit this blogpost");
        
        
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
        $this->authorize('delete-post', $post);
        $post->delete();

        session()->flash('status', 'BlogPost deleted');

        return redirect()->route('posts.index');
    }
}
