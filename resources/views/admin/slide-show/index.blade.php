@extends('admin.layout.master')
@section('title')
List Slide Show
@endsection
@section('brand')
<a class="navbar-brand" href="{{ route('admin.kategori.index') }}">Slide Show</a>
@endsection
@section('link')
<style>
    .img-slide-show {
        width: 100%;
        height: 200px;
        object-fit: cover;
        margin: 10px;
    }

    .content .row {
        width: 100%;
    }

    @media (max-width: 600px){
        .img-slide-show {
            height: 100px;
        }
    }
</style>
@endsection
@section('content')
<div class="content">
    <div class="container-fuild">
        <div class="card">
            <div class="header">
                <h4 class="title">List Slide Show</h4>
            </div>
            <div class="content table-responsive table-full-width">
                <div class="row">
                    @foreach($album as $a)
                    <div class="col-md-4 col-xs-6">
                        <div class="" style="position: absolute; background-color: black; width: 100%; height: 100%; margin: 10px; z-index: 999">
                            aklas
                        </div>
                        <img src="{{ url('/') . '/' . $a->thumbnail }}" class="img-slide-show" alt="{{ $a->judul }}">
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
@endsection
