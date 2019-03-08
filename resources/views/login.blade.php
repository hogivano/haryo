@extends('layout.master')
@section('link')
@endsection
@section('content')
<form method="post" action="{{ route('login.submit') }}">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="inputUsername">Email/Username</label>
        <input type="text" class="form-control" id="inputUsername" name="usrmail" aria-describedby="usernameHelp" placeholder="username">
    </div>
    <div class="form-group">
        <label for="inputPassword">Password</label>
        <input type="password" class="form-control" id="inputPassword" name="password" aria-describedby="passwordHelp" placeholder="password">
    </div>

    <button type="submit" class="btn btn-info btn-fill">Login</button>
</form>
@endsection
@section('script')

@endsection
