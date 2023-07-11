@extends('layouts.app')
<link href="{{ asset('css/login.css') }}" rel="stylesheet" type="text/css" >
@section('content')
<div class="main">
    <div class="form-container">
        <form action="{{ route('login') }}" method="POST">
            <h3>Login</h3>
            @csrf
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ old('username') }}">
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div>
                <button class="btn" type="submit" style="color: white;">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection