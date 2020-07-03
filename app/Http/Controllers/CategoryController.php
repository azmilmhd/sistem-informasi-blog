<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view ('category.index' , compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'cat_nama' => 'required|min:2',
            'cat_text' => 'required',
        ],[
            'cat_nama.required' => 'Nama Kategori Tidak Boleh Kosong',
            'cat_text.required' => 'Keterangan Tidak Boleh Kosong'
        ]);
        $category = new Category([
            'cat_nama'=>$request->input('cat_nama'),
            'cat_text'=>$request->input('cat_text')
        ]);
        $category->save();
        return redirect('category')->with('status', 'Data Berhasil Ditambah!');
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
        $category = Category::find($id);
        return view('category/edit', compact('category'));
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
            'cat_nama' => 'required|min:2',
            'cat_text' => 'required',
        ]);

        $category=Category::find($id);
        $category->cat_nama=$request->input('cat_nama');
        $category->cat_text=$request->input('cat_text');
        $category->save();
        return redirect('category')->with('status', 'Data Berhasil Diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category=Category::find($id);
        $category->delete();
        return redirect('category')->with('status', 'Data Berhasil Dihapus!');
    }
}
