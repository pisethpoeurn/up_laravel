<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        $categories = Category::all();
        return view("post.postList", compact("posts", "categories"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Create The Post
        $image = $request->file('image');
        $filename = time() . '.' . $image->getClientOriginalExtension();
       
        $upload = 'assets/img/posts/';
        $filename = time().$image->getClientOriginalName();
        $path = move_uploaded_file($image->getPathName(), $upload. $filename);
    
        $posts = new Post;
        $posts->category_id = $request->category_id;
        $posts->title = $request->title;
        $posts->author = $request->author;
        $posts->image = $filename;
        $posts->short_desc = $request->short_desc;
        $posts->description = $request->description;
        $posts->save();
    
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        if($request->file('image') != ""){
            $image = $request->file('image');
            $upload = 'assets/img/posts/';
            $filename = time().$image->getClientOriginalName();
            $path = move_uploaded_file($image->getPathName(), $upload. $filename);
		}
		$post = Post::find($id);
		$post->category_id = $request->category_id;
		$post->title = $request->Input('title');
		$post->author = $request->Input('author');
		if(isset($filename)){
		    $post->image = $filename;
		}
		$post->short_desc = $request->Input('short_desc');
		$post->description = $request->Input('description');
		$post->save();
		return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::find($id);
        $posts->delete();
        return back();
    }
}
