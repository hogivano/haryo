@extends('layout.master')
@section('link')
<style>
.flex-center {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-content: center;
}
.hero-message {
    color: #fff;
    text-shadow: #343a40 2px 2px;
    min-width: 100%;
    min-height: 12em;
    position: relative;
}
.hero-message::before {
    content: "";
    display: block;
    position: absolute;
    margin-left: 0;
    min-width: 100%;
    min-height: 12em;
    z-index: -1;
    opacity: 0.4;
    background-color: #343a40;
}
.hero-title,
.hero-sub-title {
    width: 100%;
    display: block;
    text-align: center;
}

.hero-title {
    margin: 3% 0;
    text-transform: uppercase;
}
</style>
@endsection
@section('content')
<div class="parent-middle">
    <div class="child-middle margin-auto">
        <div class="width-100p m-v-20">
            <img src="{{ asset('img/logo-putih.png') }}" class="img-responsive width-400 margin-auto" alt="">
        </div>
        <form method="post" action="{{ route('login.submit') }}">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="inputUsername" class="text-white m-v-10">Email/Username</label>
                <input type="text" class="form-control input-outline-light" id="inputUsername" required name="usrmail" aria-describedby="usernameHelp" placeholder="username">
            </div>
            <div class="form-group">
                <label for="inputPassword" class="text-white m-v-10">Password</label>
                <input type="password" class="form-control input-outline-light" id="inputPassword" required name="password" aria-describedby="passwordHelp" placeholder="password">
            </div>
            <div class="m-v-30 width-100p text-center">
                <button type="submit" class="btn btn-outline-light width-40p">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script>
    $(document).ready(function(){
        $('body').addClass('bg-photography');
    });
</script>
@endsection
