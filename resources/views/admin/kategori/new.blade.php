@extends('admin.layout.master')
@section('title')
Kategori New
@endsection
@section('brand')
<a class="navbar-brand" href="{{ route('admin.kategori.index') }}">Kategori</a>
@endsection
@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="card">
            <div class="header">
                <h4 class="title">Kategori Baru</h4>
            </div>
            <div class="content">
                <form method="post" action="{{ route('admin.kategori.create') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label>Kategori</label>
                        <input type="text" required name="kategori" class="form-control" placeholder="Kategori" >
                    </div>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea type="text" class="form-control" name="deskripsi" placeholder="Deskripsi" style="height: 300px"></textarea>
                    </div>
                    <img src="" id="icon" class="img-upload"/>
                    <div class="custom-file" style="margin: 20px 0;">
                        <input type="file" class="custom-file-input" name="icon" id="file-img">
                        <label class="custom-file-label" for="customFile">Choose file</label>
                    </div>
                    <button type="submit" class="btn btn-info btn-fill pull-left">Simpan</button>
                    <div class="clearfix"></div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
            $('#icon').attr('src', e.target.result)
        }
        reader.readAsDataURL(input.files[0]);
    }
}
$('#file-img').change(function() {
    filePreview(this);
});
</script>
@endsection
