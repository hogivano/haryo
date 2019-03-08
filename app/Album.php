<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    //
    protected $table = "album";

    protected $fillable = [
        "judul", "deskripsi", "images", "thumbnail", "slide_show", "tanggal", "created_at", "updated_at"
    ];
}
