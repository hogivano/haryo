<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = "video";

    protected $fillable = [
        "judul", "deskripsi", "tanggal", "link", "created_at", "updated_at"
    ];
}
