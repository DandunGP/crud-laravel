@extends('layouts.login')

@section('container')
    @if(session()->has('success'))
    <div class="alert alert-success alert-dismissible fade show"  role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action="/register" method="post">
        @csrf
        <div class="form-floating mt-1">
            <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="username" autofocus>
            @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-floating mt-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="password">
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button class="btn btn-primary w-100 mt-3" type="submit"> Register </button>
    </form>
    <hr>
    <div class="text-center">
        <a class="small" href="/login">Already have an account? Login!</a>
    </div>
@endsection
</body>
</html>