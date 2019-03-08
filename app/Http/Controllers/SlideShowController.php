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

    public function slideShowNew(){
        return view('admin.slide-show.new');
    }

    public function slideShowSubmit(Request $req){
        $update = Album::where('id', $req->id)->update([
            'slide_show' => 1
        ]);

        return redirect()->route('admin.slide-show.index');
    }
}
