@extends('layouts.app')
<link href="{{ asset('css/client.css') }}" rel="stylesheet" type="text/css" >
@section('content')
    <h3>Welcome, {{$user->first_name}} {{ $user->last_name }}</h3>
@endsection