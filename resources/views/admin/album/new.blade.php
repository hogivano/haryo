@extends('admin.layout.master')
@section('title')
Album Baru
@endsection
@section('link')
<link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css">
<link rel="stylesheet" href="{{ asset('css/maps.css') }}">
<style>
    .dropzone {
        border: 1px dashed blue;
    }

    #div-image {
        margin : 10px 0;
    }
</style>
@endsection
@section('content')

<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="header">
                <h4 class="title">Album Baru</h4>
            </div>
            <div class="content">
                <input id="pac-input" class="controls" type="text" placeholder="Enter a location">
                <div id="map"></div>
                <div id="infowindow-content">
                    <span id="place-name"  class="title"></span><br>
                    Place ID <span id="place-id"></span><br>
                    <span id="place-address"></span>
                </div>
                <form id="form-album" class="" onsubmit="submitCheck()" action="{{ route('admin.album.create') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Judul</label>
                        <input type="text" name="judul" required class="form-control" placeholder="judul" >
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" style="height: 300px"></textarea>
                    </div>
                    <div class="form-group">
                        <label>Tanggal</label>
                        <input type="date" name="tanggal" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Lokasi</label>
                        <input id="nama_lokasi" type="text" name="nama_lokasi" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Lat</label>
                        <input id="lat" type="text" name="lat" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Lng</label>
                        <input id="lng" type="text" name="lng" class="form-control" >
                    </div>
                    <div class="form-group">
                        <label>Kategori</label>
                        <div class="">
                            @foreach($kategori as $k)
                            <div class="checkbox-inline">
                                <label for="{{ $k->kategori }}" style="font-size: 13px">
                                    <input id="{{ $k->kategori }}" name="kategori[]" value="{{ $k->id }}" class="check-kategori" type="checkbox">{{ $k->kategori }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <input type="file" required id="upload-image" name="image[]" multiple>
                    </div>
                    <div id="div-image">
                        <div class="row">

                        </div>
                    </div>
                    @if($errors->has('img'))
                    <div class="" style="margin-top: 10px; margin-bottom: 10px">
                        <span class="text-danger">{{ $errors->first('img') }}</span>
                    </div>
                    @endif
                    <button type="submit" class="btn btn-primary" name="submit">Simpan</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script src="{{ asset('js/dropzone.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/maps.js') }}" async defer></script>
<script src="https://maps.googleapis.com/maps/api/js?callback=initMap&amp;language=id&amp;libraries=places&amp;key=AIzaSyAHhQ07Y2PA3CAy1CeQc9hQGC1eJXxytOA"
        async defer></script>
<script type="text/javascript">
    function submitCheck(){
        if (checkKategori()){
            return true;
        }
        return false;
    }
    $(document).ready(function(){
        $('#form-album').submit(function(e){
            if (checkKategori()){
                return;
            }
            $.notify({
	               // options
	           message: 'Salah satu kategori harus dicentang'
           },{
	              // settings
                position: null,
                allow_dismiss: true,
              	type: 'danger',
                  placement: {
              		from: "bottom",
              		align: "center"
              	},
            });
            e.preventDefault();
        });
        $('#upload-image').change(function() {
            filePreview(this);
        });
        // $('input[name="judul"]').keyup(function(){
        //     if ($(this).val() == ""){
        //         hideFormDropzone();
        //     } else {
        //         if (checkKategori()){
        //             showFormDropzone();
        //         }
        //     }
        // });
        //
        // $('.check-kategori').on('change', function(){
        //     if (checkKategori() && checkJudul()){
        //         showFormDropzone();
        //     } else {
        //         hideFormDropzone();
        //     }
        //     // console.log(test);
        // });
        //
    });

    function filePreview(input) {
        $('#div-image .row').empty();
        console.log(input.files.length);
        if (input.files.length > 0){
            for (var i = 0; i < input.files.length; i++) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#div-image .row').append('<div class="col-md-3 col-xs-12">' +
                    '<img src="'+ e.target.result +'" style="width: 100%; height: 200px; object-fit: cover;">' +
                    '</div>');
                }
                reader.readAsDataURL(input.files[i]);
            }
        }
        // if (input.files && input.files[0]) {
        //     var reader = new FileReader();
        //     reader.onload = function(e) {
        //         $('#icon').attr('src', e.target.result)
        //     }
        //     reader.readAsDataURL(input.files[0]);
        // }
    }

    function hideFormDropzone(){
        if (!$("#form-images").hasClass("hide")){
            $('#form-images').addClass('hide');
        }
    }

    function showFormDropzone(){
        var urlUpload = '{{ route("admin.album.upload") }}';
        var url = urlUpload + '?judul=' + $('input[name="judul"]').val();
        console.log(url);
        $('#form-album').attr('action', url);
        if ($('#form-images').hasClass('hide')){
            $('#form-images').removeClass('hide');
        }
    }

    function checkJudul(){
        if ($('input[name="judul"]').val() == ""){
            return false;
        } else {
            return true;
        }
    }

    function checkKategori(){
        var cek = false;
        $('input[name="kategori[]"]').each(function(){
            if($(this).prop('checked')){
                cek = true;
            }
        });
        return cek;
    }
</script>
@endsection
