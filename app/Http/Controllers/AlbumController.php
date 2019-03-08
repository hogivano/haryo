<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    //
    public function albumIndex(){
        return view('admin.album.index');
    }

    public function albumNew(){
        return view('admin.album.new');
    }

    public function albumEdit($id){
        $album = Album::where('id', $id)->first();
        return view('admin.album.edit', compact('album'));
    }

    public function albumCreate(Request $req){
        return redirect()->route('admin.album.index');
    }

    public function albumUpdate(Request $req){
        return redirect()->route('admin.album.index');
    }

    public function albumDelete(Request $req){
        $del = Album::where('id', $req->id)->delete();
        return redirect()->route('admin.album.index');
    }
}
