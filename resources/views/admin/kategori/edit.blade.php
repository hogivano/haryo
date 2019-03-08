@extends('admin.layout.master')
@section('title')
Kategori Edit
@endsection
@section('brand')
<a class="navbar-brand" href="{{ route('admin.kategori.index') }}">Kategori</a>
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="header">
                <h4 class="title">Edit Kategori</h4>
            </div>
            <div class="content">
                <form method="post" action="{{ route('admin.kategori.update', $kategori->id) }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" required name="kategori" class="form-control" value="{{ $kategori->kategori }}" placeholder="Kategori" >
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" style="height: 300px">{{ $kategori->deskripsi }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-info btn-fill pull-left">Update</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection
