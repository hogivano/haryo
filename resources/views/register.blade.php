@extends('layout.master')
@section('link')
@endsection
@section('content')
<form method="post" action="{{ route('register.submit') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="exampleInputEmail1">Nama</label>
        <input type="text" class="form-control" id="inputNama" name="nama" aria-describedby="namaHelp" placeholder="Nama Lengkap">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="inputUsername">Username</label>
        <input type="text" class="form-control" id="inputUsername" name="username" aria-describedby="usernameHelp" placeholder="username">
    </div>
    <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="password" class="form-control" id="inputPassword" name="password" aria-describedby="passwordHelp" placeholder="password">
    </div>

    <button type="submit" class="btn btn-info btn-fill">Register</button>
</form>
@endsection
@section('script')

@endsection
