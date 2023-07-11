@extends('layouts.app')
<link href="{{ asset('css/register.css') }}" rel="stylesheet" type="text/css" >
@section('content')
@push('head')
<script src="{{ asset('js/flash.js') }}"></script>
@endpush
<div class="main">
    <div class="flash">
        @if (session('success-password'))
            <div id="flash-message" class="alert alert-success">
                {{ session('success-password') }}
            </div>
        @endif
    </div>
    <div class="form-container">
        <form action="{{ route('update-password') }}" method="POST">
            <h3>Change Password</h3>
            @csrf
            <div>
                <div>
                    <label for="current_password">Current Password</label>
                    <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" id="current_password">
                    @error('current_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            
                <div>
                    <label for="password">New Password</label>
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
<script src="{{ asset('js/flash.js') }}"></script>
<script>
    $(function() {
        $('#flash-message').delay(3000 ).fadeOut(500);
        $('#error-flash').delay(5000).fadeOut(500);
    });
</script>
@endsection
