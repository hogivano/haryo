<?php

namespace App\Http\Controllers;

use App\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    //
    public function videoIndex(){
        $video = Video::all();
        return view('admin.video.index', compact('video'));
    }

    public function videoNew(){
        return view('admin.video.new');
    }

    public function videoEdit($id){
        $video = Video::where('id', $id)->first();
        return view('admin.video.edit', compact('video'));
    }

    public function videoCreate(Request $req){
        $video = new Video();
        $video->judul = $req->judul;
        $video->deskripsi = $req->deskripsi;
        $video->link = $req->link;
        $video->tanggal = $req->tanggal;
        $video->save();
        return redirect()->route('admin.video.index');
    }

    public function videoUpdate(Request $req, $id){
        $video = Video::where('id', $id)->update([
            'judul' => $req->judul,
            'deskripsi' => $req->deskripsi,
            'link' => $req->link,
        ]);
        return redirect()->route('admin.video.index');
    }

    public function videoDelete(Request $req){
        $video = Video::where('id', $req->id)->delete();
        return redirect()->route('admin.video.index');
    }
}
