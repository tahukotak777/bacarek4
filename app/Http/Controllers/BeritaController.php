<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use File;
use Illuminate\Http\Request;
use Storage;
use Validator;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $idAccount = $request->cookie("idAccount");
        $validator = Validator::make([
            "title" => $request->title,
            "photo" => $request->photo,
            "desc" => $request->desc,
            "tanggal" => $request->tanggal,
            'kategori' => $request->kategori,
        ], [
            "title" => "required",
            "photo" => "required|file|image",
            "desc" => "required",
            "tanggal" => "required",
            "kategori" => "required",
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        ;

        $file = $request->file("photo");
        $fileName = time() . '.' . $file->extension();
        $UploadaImage = $file->move(public_path("assets/Upload"), $fileName);

        $post = Berita::create([
            'title' => $request->title,
            'photo' => $fileName,
            'desc' => $request->desc,
            'tanggal' => $request->tanggal,
            'ID_kategori' => $request->kategori,
            'ID_account' => $idAccount,
        ]);

        return redirect()->back()->with("success", "berhasil membuat berita");
    }

    /**
     * Display the specified resource.
     */
    public function show(Berita $berita)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Berita $berita)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Berita $berita, $idBerita)
    {
        $data = Berita::find($idBerita);
        if ($request->has('title')) {
            $data->title = $request->title;
        }
        if ($request->has('photo')) {
            if ($data->photo != null && File::exists(public_path('assets/Upload/' . $data->photo))) {
                File::delete(public_path('assets/Upload/' . $data->photo));
            }
            $file = $request->file('photo');
            $filename = time() . '.' . $file->extension();
            $file->move(public_path('assets/Upload'), $filename);
            $data->photo = $filename;
        }
        if ($request->has('desc')) {
            $data->desc = $request->desc;
        }
        if ($request->has('tanggal')) {
            $data->tanggal = $request->tanggal;
        }
        if ($request->has('kategori')) {
            $data->ID_kategori = $request->kategori;
        }
        $data->update();
        return redirect("/")->with("success","Berhasil mengubah berita");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Berita $berita, $idBerita)
    {
        $data = Berita::find($idBerita);
        if ($data->photo != null && File::exists(public_path("assets/Upload/" . $data->photo))) {
            File::delete(public_path("assets/Upload/" . $data->photo));
            $data->delete();
        } else {
            $data->delete();
        }
        return redirect()->back()->with("success", "berhasil menghapus data");
    }
}
