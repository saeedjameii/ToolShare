@extends('layout.master')
@section('title', 'Forget Password — ToolShare')


@section('nav-links')
    <p></p>
@endsection


@section('header-actions')
<p></p>
@endsection

@section('content')

<a href="{{ route('resetPassword', ['token' => $token]) }}">Reset Password</a>

@endsection
