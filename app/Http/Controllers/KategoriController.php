<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        $response = [
            'success' => true,
            'data' =>  $kategori,
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
            'nama_kategori' => 'required|unique:kategoris'
        ]);
        $kategori = new Kategori();
        $kategori->nama_kategori = $request->nama_kategori;
        $kategori->slug = str_slug($request->nama_kategori, '-');
        $kategori->save();
        $response = [
            'success' => true,
            'data' =>  $kategori,
            'message' => 'Berhasil ditambahkan.'
        ];

        return response()->json($response, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kategori  $kategori
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
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kategori = Kategori::find($id)->delete($id);

        $response = [
            'success' => true,
            'data' =>  $kategori,
            'message' => 'Berhasil dihapus.'
        ];
        return response()->json($response, 200);
    }
}
