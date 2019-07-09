<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tag;
use Session;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tag = Tag::orderBy('created_at','desc')->get();
        return view('admin.tag.index', compact('tag'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');
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
            'nama_tag' => 'required|unique:tags'
        ]);
        $tag = new Tag();
        $tag->nama_tag = $request->nama_tag;
        $tag->slug = str_slug($request->nama_tag, '-');
            $tag->save();
            Session::flash("flash_notification",[
                "level" => "success",
                "message" => "Berhasil menyimpan <b>"
                             . $tag->nama_tag."</b>"
            ]);
            return redirect()->route('tag.index');
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
        $tag = Tag::findOrFail($id); 
        return view('admin.tag.edit', compact('tag'));
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
            'nama_tag' => 'required'
        ]);
        $tag = Tag::findOrFail($id);
        $tag->nama_tag = $request->nama_tag;
        $tag->slug = str_slug($request->judul, '-');
            $tag->save();
            Session::flash("flash_notification",[
                "level" => "success",
                "message" => "Berhasil edit <b>"
                             . $tag->nama_tag."</b>"
            ]);
            return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::findOrFail($id);
        if(!Tag::destroy($id)) return redirect()->back();
        Session::flash("flash_notification",[
            "level" => "success",
            "message" => "Berhasil menghapus <b>"
                         . $tag->nama_tag."</b>"
        ]);
        return redirect()->route('tag.index');
    }
}
