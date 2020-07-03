<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Photo;
use App\Album;
class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $album['album'] = Album::all();
        return view('album.index')->with($album);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $album['photo'] = Photo::all();
        return view('album.create')->with($album);
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
            'album_name' => 'required',
            'album_text' => 'required|min:2',
           
        ],[
            'album_name.required' => 'Nama Kategori Tidak Boleh Kosong',
            'album_text.required' => 'Keterangan Tidak Boleh Kosong',
            
        ]);

        $album = new Album;
        $album->album_photo_id = $request->input('album_photo_id');
        $album->album_name = $request->input('album_name');
        $album->album_text = $request->input('album_text');
       

        $album->save();
        return redirect('album')->with('status' , 'data berhasil ditambahkan');
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
        $album['album'] = Album::find($id);
        $album['photo'] = Photo::all();
        return view('album.edit')->with($album);
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
            'album_name' => 'required',
            'album_text' => 'required|min:2',
           
        ],[
            'album_name.required' => 'Nama Kategori Tidak Boleh Kosong',
            'album_text.required' => 'Keterangan Tidak Boleh Kosong',
            
        ]);
        $album = Album::find($id);
        $album->album_photo_id = $request->input('album_photo_id');
        $album->album_name = $request->input('album_name');
        $album->album_text = $request->input('album_text');
        $album->save();
        return redirect('album')->with('status', 'Data Berhasil Diupdate!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album=Album::find($id);
        $album->delete();
        return redirect ('album')->with('status', 'data terhapus');
    }
}
