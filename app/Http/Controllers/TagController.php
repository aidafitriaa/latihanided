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
        $tag->slug = str_slug($request->judul, '-');
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
        $tag = Tag::findOrFail($id);
        return view('admin.tag.show', compact('tag'));
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
        $kategori = Kategori::all();
        $tag = Tag::all();  
        $select = $tag->tag->pluck('id')->toArray();
        return view('admin.tag.edit', compact('tag','kategori','select','tag'));
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
            'judul' => 'required|unique:tags',
            'konten' => 'required|min:50',
            'id_kategori' => 'required',
            'tag' => 'required'
        ]);
        $tag = Tag::findOrFail($id);
        $tag->judul = $request->judul;
        $tag->slug = str_slug($request->judul, '-');
        $tag->konten = $request->konten;
        $tag->id_user = $request->id;
        $tag->id_kategori = $request->id_kategori;
        //foto
        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $path = public_path() .'/assets/img/tag';
            $filename = str_random(6) .'-'
            . $file->getClientOriginalName();
            $upload = $file->move(
                $path,$filename
            );
            // hapus foto lama jika ada
            if ($tag->foto){
                $old_foto = $tag->foto;
                $filepath = public_path() .
                    '/assets/img/tag/' .
                    $tag->foto;
                    try{
                        File::delete($filePath);
                    } catch (FileNotFoundException $e) {
                        //file sudah dihapus/tidak ada
                    }
            }
            $tag->foto = $filename;
            }
            $tag->save();
            $tag->tag()->sync($request->tag);
            Session::flash("flash_notification",[
                "level" => "success",
                "message" => "Berhasil edit <b>"
                             . $tag->judul."</b>"
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
        $blog = Tag::findOrFail($id);
        if ($tag->foto) {
            $old_foto = $tag->foto;
            $filepath = public_path()
            . '/assets/img/tag/' .$tag->foto;
            try {
                File::delete($filepath);
            }catch (FileNotFoundException $e) {
                // file sudah dihapus/tidak ada
            }
        }
        $tag->tag()->detach($tag->id);
        $tag->delete();
        Session::flash("flash_notification",[
            "level" => "success",
            "message" => "Berhasil menghapus <b>"
                         . $blog->judul."</b>"
        ]);
    }
}
