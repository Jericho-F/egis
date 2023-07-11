@extends('layouts.app')
<link href="{{ asset('css/admin.css') }}" rel="stylesheet" type="text/css" >
@section('content')
    <div class="table">
        <table class="info">
            <tr>
                <th>First name</th>
                <th>Last name</th>
                <th>Username</th>
                <th class="action">Action</th>
            </tr>
            @foreach ($getUsers as $user)
            <tr>
                <td>{{$user->first_name}}</td>
                <td>{{$user->last_name}}</td>
                <td>{{$user->username}}</td>
                <td><a href="{{ route('disable', $user->id) }}"><button class="action-btn">Disable Account</button></a></td>
            </tr>
            @endforeach
        </table>
    </div>
@endsection