@extends('admin.layout.master')
@section('title')
Kategori Edit
@endsection
@section('brand')
<a class="navbar-brand" href="{{ route('admin.kategori.index') }}">Kategori</a>
@endsection
@section('content')
<div class="content">
    <div class="container-fuild">
        <p class="category"><a href="{{ route('admin.kategori.new') }}" class="btn btn-success" style="font-size: 15px; padding: 5px 10px">Baru</a></p>
        <div class="card">
            <div class="header">
                <h4 class="title">List Kategori</h4>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Kategori</th>
                        <th>Deksripsi</th>
                        <th>Jumlah Foto</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($kategori as $k)
                        <tr>
                            <td>{{ $k->kategori }}</td>
                            <td>{{ $k->deskripsi }}</td>
                            <td>{{ sizeof($k->KategoriAlbum) }}</td>
                            <td>
                                <a href="{{ route('admin.kategori.edit', $k->id) }}" class="btn btn-outline-secondary" style="padding: 2px 10px; !important; margin-right: 5px"><i class="pe-7s-note"></i></a>
                                <form class="" action="{{ route('admin.kategori.delete') }}" style="display:inline" method="post">
                                    {{ csrf_field() }}
                                    <input type="text" hidden="hidden" name="id" value="{{ $k->id }}">
                                    <input type="text" hidden="hidden" name="icon" value="{{ $k->images }}">
                                    <button class="btn btn-outline-secondary" onclick="return confirm('anda yakin menghapusnya?')" style="padding: 2px 10px; !important"><i class="pe-7s-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection
