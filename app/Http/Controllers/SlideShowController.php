<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class SlideShowController extends Controller
{
    //
    public function slideShowIndex(){
        $album = Album::where('slide_show', 1)->get();
        return view('admin.slide-show.index', compact('album'));
    }

    public function slideShowChange(Request $req){
        if ($req->slide_show == 1) {
            $change = Album::where('id', $req->id)->update([
                'slide_show' => 0
            ]);
        } else if ($req->slide_show == 0){
            $change = Album::where('id', $req->id)->update([
                'slide_show' => 1
            ]);
        }

        if ($req->route == 'album'){
            return redirect()->route('admin.album.index');
        } else if ($req->route == 'slide-show'){
            return redirect()->route('admin.slide-show.index');
        }
    }
}
