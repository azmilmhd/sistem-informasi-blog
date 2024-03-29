<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post['post'] = Post::all();
        return view('post.index')->with($post);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $post['category'] = Category::all();
        return view('post.create')->with($post);
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
            'post_date' => 'required',
            'post_slug' => 'required|min:2',
            'post_title' => 'required|min:2',
            'post_text' => 'required|min:2',
        ],[
            'post_date.required' => 'Nama Kategori Tidak Boleh Kosong',
            'post_slug.required' => 'Keterangan Tidak Boleh Kosong',
            'post_title.required' => 'Keterangan Tidak Boleh Kosong',
            'post_text.required' => 'Keterangan Tidak Boleh Kosong'
        ]);

        $post = new Post;
        $post->post_cat_id = $request->input('post_cat_id');
        $post->post_date = $request->input('post_date');
        $post->post_slug = $request->input('post_slug');
        $post->post_title = $request->input('post_slug');
        $post->post_text = $request->input('post_text');

        $post->save();
        return redirect('post')->with('status' , 'data berhasil ditambahkan');
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
        $post['post'] = Post::find($id);
        $post['category'] = Category::all();
        return view('post.edit')->with($post);

        
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
        $request->validate([
            'post_date' => 'required',
            'post_slug' => 'required',
            'post_title' => 'required',
            'post_text' => 'required',
        ]);
        $post = Post::find($id);
        $post->post_cat_id = $request->input('post_cat_id');
    	$post->post_date = $request->input('post_date');
        $post->post_slug = $request->input('post_slug');
        $post->post_title = $request->input('post_title');
        $post->post_text = $request->input('post_text');
    	$post->save();
        return redirect('post')->with('status', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->delete();
        return redirect ('post')->with('status', 'data terhapus');
    }
}
