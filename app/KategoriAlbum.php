<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriAlbum extends Model
{
    //
    protected $table = "kategori_album";

    protected $fillable = [
        "id_album", "id_kategori"
    ];

    public function Album(){
        return $this->belongsTo('App/Album', 'id', 'id_album');
    }

    public function Kategori(){
        return $this->belongsTo('App\Kategori', 'id', 'id_kategori');
    }
}
