@extends('admin.layout.master')
@section('title')
Video New
@endsection
@section('brand')
<a class="navbar-brand" href="{{ route('admin.video.index') }}">Video</a>
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="header">
                <h4 class="title">Video Baru</h4>
            </div>
            <div class="content">
                <form method="post" action="{{ route('admin.video.create') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="judul" class="form-control" placeholder="judul" >
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea type="text" class="form-control" name="deskripsi" placeholder="deskripsi" style="height: 300px"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" required name="link" class="form-control" placeholder="link youtube" >
                    </div>
                    <button type="submit" class="btn btn-info btn-fill pull-left">Simpan</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
