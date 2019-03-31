@extends('admin.layout.master')
@section('title')
Video Edit
@endsection
@section('brand')
<a class="navbar-brand" href="{{ route('admin.video.index') }}">Video</a>
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="header">
                <h4 class="title">Video Edit</h4>
            </div>
            <div class="content">
                <form method="post" action="{{ route('admin.video.update', $video->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="judul" value="{{ $video->judul }}" class="form-control" placeholder="judul" >
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea type="text" class="form-control" name="deskripsi" placeholder="deskripsi" style="height: 300px">{{ $video->deskripsi }}</textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" value="{{ $video->tanggal }}" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Link</label>
                        <input type="text" required name="link" value="{{ $video->link }}" class="form-control" placeholder="link youtube" >
                    </div>
                    <button type="submit" class="btn btn-info btn-fill pull-left">Update</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
