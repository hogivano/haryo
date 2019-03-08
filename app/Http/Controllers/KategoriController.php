<?php

namespace App\Http\Controllers;

use App\Kategori;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as Image;

class KategoriController extends Controller
{
    //
    public function kategoriIndex(){
        $kategori = Kategori::with('KategoriAlbum')->get();
        return view('admin.kategori.index', compact('kategori'));
    }

    public function kategoriNew(){
        return view('admin.kategori.new');
    }

    public function kategoriEdit($id){
        $kategori = Kategori::where('id', $id)->first();
        return view('admin.kategori.edit', compact('kategori'));
    }

    public function kategoriCreate(Request $req){
        $new = new Kategori();
        $new->kategori = $req->kategori;
        $new->deskripsi = $req->deskripsi;
        if($req->has('icon')){
            $nama_icon = $req->kategori .  '.' . $req->file('icon')->getClientOriginalExtension();
            $img = Image::make($req->file('icon'));
            $img->resize(300, null, function($constraint){
                $constraint->aspectRatio();
            });
            $pathImg = public_path() . "/img" . "/kategori" ;
            if (!file_exists($pathImg)){
                mkdir($pathImg, 0777, true);
            }
            $img->save(public_path() . "/img" . "/kategori" . "/" . $nama_icon);
            chmod(public_path() . "/img" . "/kategori" . "/" . $nama_icon , 0777);

            $new->images = 'img/kategori/' . $nama_icon;

        }
        $new->save();
        return redirect()->route('admin.kategori.index');
    }

    public function kategoriUpdate(Request $req, $id){
        $update = Kategori::where('id', $id)->update([
            'kategori' => $req->kategori,
            'deskripsi' => $req->deskripsi
        ]);

        return redirect()->route('admin.kategori.index');
    }

    public function kategoriDelete(Request $req){
        if ($req->icon != null && $req->icon != ""){
            if (file_exists(public_path() . '/' . $req->icon)){
                unlink(public_path() . '/' . $req->icon);
            }
        }
        $del = Kategori::where('id', $req->id)->delete();
        return redirect()->route('admin.kategori.index');
    }
}
