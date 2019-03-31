@extends('admin.layout.master')
@section('title')
Video
@endsection
@section('brand')
<a class="navbar-brand" href="{{ route('admin.video.index') }}">Video</a>
@endsection
@section('content')
<div class="content">
    <div class="container-fuild">
        <p class="category"><a href="{{ route('admin.video.new') }}" class="btn btn-success" style="font-size: 15px; padding: 5px 10px">Baru</a></p>
        <div class="card">
            <div class="header">
                <h4 class="title">List Video</h4>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Judul</th>
                        <th>Deksripsi</th>
                        <th>Tanggal</th>
                        <th>Link</th>
                        <th>Display</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($video as $v)
                        <tr>
                            <td>{{ $v->judul }}</td>
                            <td>{{ $v->deskripsi }}</td>
                            <td>{{ $v->tanggal }}</td>
                            <td>{{ $v->link }}</td>
                            <td>
                                @if($v->display == 1)
                                Ditampilkan
                                @else
                                Tidak Tampil
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('admin.video.edit', $v->id) }}" class="btn btn-outline-secondary" style="padding: 2px 10px; !important; margin-right: 5px"><i class="pe-7s-note"></i></a>
                                <form class="" action="{{ route('admin.video.delete') }}" style="display:inline" method="post">
                                    {{ csrf_field() }}
                                    <input type="text" hidden="hidden" name="id" value="{{ $v->id }}">
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
