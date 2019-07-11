<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;

class ArtikelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::with('kategori','user')->get();
        $response = [
            'success' => true,
            'data' =>  $artikel,
            'message' => 'Berhasil ditampilkan.'
        ];
        return response()->json($response, 200);
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
        $request->validate([
            'judul' => 'required|unique:artikels',
            'konten' => 'required|min:50',
            'foto' => 'required|mimes:jpeg,jpg,png,gif|max:2048',
            'id_kategori' => 'required',
            'tag' => 'required'
        ]);
        $artikel = new Artikel();
        $artikel->judul = $request->judul;
        $artikel->slug = str_slug($request->judul, '-');
        $artikel->konten = $request->konten;
        $artikel->id_user = Auth::user()->id;
        $artikel->id_kategori = $request->id_kategori;
        // foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path() .'/assets/img/artikel';
            $filename = str_random(6) . '_'
            . $file->getClientOriginalName();
            $upload = $file->move(
                $path,$filename
            );
            $artikel->foto = $filename;
        }
        $artikel->save();
        $artikel->tag()->attach($request->tag);
        $response = [
            'success' => true,
            'data' =>  $artikel,
            'message' => 'Berhasil ditampilkan.'
        ];
        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $artikel
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
     * @param  \App\Kategori  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::find($id)->delete($id);
        
                $response = [
                    'success' => true,
                    'data' =>  $artikel,
                    'message' => 'Berhasil dihapus.'
                ];
              return response()->json($response, 200);
    }  
}
