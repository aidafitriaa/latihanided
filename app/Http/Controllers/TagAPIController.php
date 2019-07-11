<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Http\Resources\TagCollection;
use App\Http\Resources\TagResource;
 
class tagAPIController extends Controller
{
    public function index()
    {
        return new TagCollection(Tag::paginate());
    }
 
    public function show(Tag $tag)
    {
        return new TagResource($tag->load(['artikel']));
    }

    public function store(Request $request)
    {
        return new TagResource(tag::create($request->all()));
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update($request->all());

        return new TagResource($tag);
    }

    public function destroy(Request $request, Tag $tag)
    {
        $tag->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
