<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    //
    protected $table = "kategori";
    public $timestamps = false;

    protected $fillable = [
        "kategori", "deskripsi", "images"
    ];

    public function KategoriAlbum(){
        return $this->hasMany('App\KategoriAlbum', 'id_album', 'id');
    }

}
