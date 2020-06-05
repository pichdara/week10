<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::has('category')->paginate(10);
        return view('posts.index')->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {   
        if (Auth::guest()) 
        abort(403);
        $datas = Category::all();
        return view('posts.create', compact('datas'));
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:3|max:255|unique:posts',
            'category_id'=>'required|integer|gt:0|exists:categories,id',
            'author' => 'required',
            'content' => 'required',
        ]);

        $data['posted_by'] = Auth::user()->id;

        Post::create($data);
        return redirect(route('post.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $datas = Category::get();
        return view('posts.edit', compact(['post', 'datas']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        if (Auth::guest()) 
            abort(403);
        if (Auth::user()->name == "Admin" || $post->posted_by != Auth::user()->id) {
            $data = $request->validate([
                'title'=>'min:3|max:255|unique:posts,title,' . $post->id,
                'author'=>'required',
                'category_id'=>'integer|gt:0|exists:categories,id',
                'content'=>'filled',
            ]);
            
            $data['posted_by'] = Auth::user()->id;
            $post->update($data);
            return redirect(route('post.index'))->with(['success' => 'Update Successfully']);
        } else 
            abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {   
        if (Auth::guest()) 
            abort(403);
        if (Auth::user()->name == "Admin" || $post->posted_by != Auth::user()->id) {
            $post = Post::find($post->id);
            $post->delete();
            return redirect(route('post.index'))->with(['success' => 'Delete Successfully']);
        } else 
            abort(403);

    }
}
