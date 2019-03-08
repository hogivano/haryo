@extends('admin.layout.master')
@section('title')
Album Baru
@endsection
@section('link')
<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="header">
                <h4 class="title">Album Baru</h4>
            </div>
            <div class="content">
                <form method="post" action="{{ route('admin.album.create') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control" placeholder="judul" >
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" style="height: 300px"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" >
                    </div>
                    <form action="" enctype="multipart/form-data" class="dropzone">
                        {{ csrf_field() }}
                        <div class="fallback align-middle">
                            <input name="file" type="file" multiple />
                        </div>
                    </form>
                    <button type="submit" class="btn btn-info btn-fill pull-left">Simpan</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/dropzone.js') }}" charset="utf-8"></script>
@endsection
