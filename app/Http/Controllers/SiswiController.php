<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\siswi;

class SiswiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= siswi::all(); 
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'berhasil'
    ];
        return response()->json($response,200);
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
        $data = new siswi;
        $data->nama = $request->nama;
        $data->kelas = $request->kelas;
        $data->umur = $request->umur;
        $data->hobi = $request->hobi;
        $data->alamat = $request->alamat;
        $data->save();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'berhasil'
        ];
        return response()->json($response,200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = siswi::findOrFail($id);
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'berhasil'
        ];
        return response()->json($response,200);
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
        $data =siswi::findOrFail($id);
        $data->nama = $request->nama;
        $data->kelas = $request->kelas;
        $data->umur = $request->umur;
        $data->hobi = $request->hobi;
        $data->alamat = $request->alamat;
        $data->save();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'berhasil'
        ];
        return response()->json($response,200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Siswi::findOrFail($id)->delete();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'berhasil'
        ];
        return response()->json($response,200);
    }
}