<?php

namespace App\Http\Controllers;

use App\Kategori;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
 
class KategoriAPIController extends Controller
{
    public function index()
    {
        return new CategoryCollection(Category::paginate());
    }
 
    public function show(Kategori $kategori)
    {
        return new CategoryResource($kategori->load(['artikel']));
    }

    public function store(Request $request)
    {
        return new CategoryResource(Kategori::create($request->all()));
    }

    public function update(Request $request, Kategori $kategori)
    {
        $kategori->update($request->all());

        return new CategoryResource($kategori);
    }

    public function destroy(Request $request, Kategori $kategori)
    {
        $kategori->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
