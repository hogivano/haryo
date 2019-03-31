<?php

namespace App\Http\Controllers;


use Redirect;
use App\Album;
use App\Kategori;
use App\KategoriAlbum;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class AlbumController extends Controller
{
    //
    public function albumIndex(){
        $album = Album::all();
        return view('admin.album.index', compact('album', 'kategori'));
    }

    public function albumNew(){
        $kategori = Kategori::all();
        return view('admin.album.new', compact('kategori'));
    }

    public function albumEdit($id){
        $album = Album::where('id', $id)->first();
        return view('admin.album.edit', compact('album'));
    }

    public function albumCreate(Request $req){
        // return response()->json($req->all());
        if ($req->hasFile('image')){
            $files = $req->file('image');
            $validImg = true;
            foreach ($files as $f) {
                # code...
                $ext = $f->getClientOriginalExtension();
                $ext = strtolower($ext);
                if ($ext == 'jpg' || $ext == 'png' || $ext == 'jpeg' || $ext == 'gif'){

                }  else {
                    return Redirect::back()->withInput()->withErrors([ 'img' => 'gambar album harus berfomat jpg/jpeg/png/gif' ]);
                }
            }
            foreach ($files as $f) {
                # code...
                $rand = rand(99999, 999999);
                $nama_original = $req->judul . '_' . $rand . '.' . $f->getClientOriginalExtension();
                $img_original = Image::make($f);

                $nama_thumb = 'thumb_' . $nama_original;
                $img_thumb = Image::make($f);
                $img_thumb->resize(250, null, function($constraint){
                    $constraint->aspectRatio();
                });

                $img_original->save(public_path() . "/img/album/" .  $nama_original);
                chmod(public_path() . "/img/album/" . $nama_original, 0777);

                $img_thumb->save(public_path() . "/img/thumbnail/" . $nama_thumb);
                chmod(public_path() . "/img/thumbnail/" . $nama_thumb, 0777);

                $path_original = "img/album/" . $nama_original;
                $path_thumb = "img/thumbnail/" . $nama_thumb;

                $album = new Album();
                $album->judul = $req->judul;
                $album->deskripsi = $req->deskripsi;
                $album->tanggal = $req->tanggal;
                $album->images = $path_original;
                $album->thumbnail = $path_thumb;
                $album->lat = $req->lat;
                $album->lng = $req->lng;
                $album->nama_lokasi = $req->nama_lokasi;
                $album->save();
            }
        }
        return redirect()->route('admin.album.index');
    }

    public function albumUpdate(Request $req){
        return redirect()->route('admin.album.index');
    }

    public function albumDelete(Request $req){
        $del = Album::where('id', $req->id)->delete();
        return redirect()->route('admin.album.index');
    }

    public function uploadImages(Request $req){

    }
}
