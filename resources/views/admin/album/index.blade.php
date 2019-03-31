@extends('admin.layout.master')
@section('title')
List Album
@endsection
@section('brand')
<a class="navbar-brand" href="{{ route('admin.kategori.index') }}">Album</a>
@endsection
@section('content')
<div class="content">
    <div class="container-fuild">
        <p class="category"><a href="{{ route('admin.album.new') }}" class="btn btn-success" style="font-size: 15px; padding: 5px 10px">Baru</a></p>
        <div class="card">
            <div class="header">
                <h4 class="title">List Album</h4>
            </div>
            <div class="content table-responsive table-full-width">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>Judul</th>
                        <th>Deksripsi</th>
                        <th>Tanggal</th>
                        <th>Images</th>
                        <th>Slide Show</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach($album as $b)
                        <tr>
                            <td>{{ $b->judul }}</td>
                            <td>{{ $b->deskripsi }}</td>
                            <td>{{ $b->tanggal }}</td>
                            <td>
                                <img src="{{ url('/') . '/' . $b->thumbnail }}" style="height: 50px; width: 100px; object-fit:cover" alt="">
                            </td>
                            <td>
                                <form class="" style="display:inline" action="{{ route('admin.slide-show.change') }}" method="post">
                                    {{ csrf_field() }}
                                    <input type="text" hidden="hidden" name="id" value="{{ $b->id }}">
                                    <input type="text" hidden="hidden" name="slide-show" value="{{ $b->slide_show }}">
                                    <input type="text" hidden="hidden" name="route" value="album">
                                    @if($b->slide_show == 1)
                                    <button type="submit" class="btn btn-link btn-none" onclick="return confirm('apa anda yakin tidak menjadinkan slide show?')" name="btn">
                                        Tampil
                                    </button>
                                    @elseif ($b->slide_show == 0)
                                    <button type="submit" class="btn btn-link btn-none" onclick="return confirm('apa anda yakin menjadikan slide show?')" name="btn">
                                        Tidak Tampil
                                    </button>
                                    @endif
                                </form>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-none" name="button">
                                    <i class="pe-7s-trash"></i>
                                </button>
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
