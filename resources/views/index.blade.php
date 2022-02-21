@extends('layouts.login')

@section('container')
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show"  role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show"  role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action="/login" method="post">
        @csrf
        <div class="form-floating mt-1">
            <input type="text" name="username" class="form-control form-control-user @error('username', 'post') is-invalid @enderror" id="username" placeholder="username" autofocus>
            @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mt-3">
            <input type="password" name="password" class="form-control form-control-user" id="password" placeholder="password">
        </div>
        <button class="btn btn-primary w-100 mt-3" type="submit"> Login </button>
    </form>
    <hr>
        <div class="text-center">
            <a class="small" href="/register">Create an Account!</a>
        </div>
@endsection