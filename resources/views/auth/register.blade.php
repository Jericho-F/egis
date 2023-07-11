@extends('layouts.app')
<link href="{{ asset('css/register.css') }}" rel="stylesheet" type="text/css" >
@section('content')
<div class="main">
    <div class="flash">
        @if (session('success-register'))
            <div id="flash-message" class="alert alert-success">
                {{ session('success-register') }}
            </div>
        @endif
    </div>

    <div class="form-container">
        <form action="{{ route('register') }}" method="POST">
            <h3>Register</h3>
            @csrf
            <div>
                <div>
                    <label for="first_name">First Name</label>
                    <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" value="{{ old('first_name') }}">
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
                <div>
                    <label for="last_name">Last Name</label>
                    <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" value="{{ old('last_name') }}">
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
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
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="confirm_password">
                </div>
            
                <div>
                    <button class="btn" type="submit" style="color: white;">Register</button>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection