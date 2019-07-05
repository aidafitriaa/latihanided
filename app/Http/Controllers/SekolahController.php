<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\sekolah;

class SekolahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= sekolah::all(); 
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
        $data = new sekolah;
        $data->Kepala_sekolah = $request->Kepala_sekolah;
        $data->Wali_kelas = $request->Wali_kelas;
        $data->Wakasek_kesiswaan = $request->Wakasek_kesiswaan;
        $data->Wakasek_kurikulum = $request->Wakasek_kurikulum;
        $data->Ketua_murid = $request->Ketua_murid;
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
        $data =sekolah::findOrFail($id);
        $data->Kepala_sekolah = $request->Kepala_sekolah;
        $data->Wali_kelas = $request->Wali_kelas;
        $data->Wakasek_kesiswaan = $request->Wakasek_kesiswaan;
        $data->Wakasek_kurikulum = $request->Wakasek_kurikulum;
        $data->Ketua_murid = $request->Ketua_murid;
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
        $data = Sekolah::findOrFail($id)->delete();
        $response = [
            'success' => true,
            'data' => $data,
            'message' => 'berhasil'
        ];
        return response()->json($response,200);
    }
}
