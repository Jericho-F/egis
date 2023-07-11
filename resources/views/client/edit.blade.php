@extends('layouts.app')
<link href="{{ asset('css/edit.css') }}" rel="stylesheet" type="text/css" >
@section('content')
<div class="main">
    <div class="form-container">
        <form action="{{ route('update-profile') }}" method="POST">
            <h3>Edit Information</h3>
            @csrf
            @method('PUT')
            <div class="form">
                <label for="first_name">First Name</label>
                <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" id="first_name" value="{{ $user->first_name }}">
                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        
            <div>
                <label for="last_name">Last Name</label>
                <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" id="last_name" value="{{ $user->last_name }}">
                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        
            <div>
                <label for="username">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" value="{{ $user->username }}">
                @error('username')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div>
                <button class="btn" type="submit" style="color: white;">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection