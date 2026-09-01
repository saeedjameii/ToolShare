@extends('layout.master')
@section('title', 'Forget Password — ToolShare')


@section('nav-links')
    <p></p>
@endsection


@section('content')
    <main class="auth-page">
        <div class="auth-card">
            <a class="logo auth-logo" href="{{ route('home') }}"><span class="logo-icon">🔧</span>ToolShare</a>
            <h1>Verify Your Email</h1>
            <p class="auth-subtitle">
                Verify your email to continue borrowing and sharing useful tools.
            </p>
            @if (session()->has('error'))
                <div class="text-danger">{{ session('error') }}</div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('forgetPassword.post') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email">Email address</label><input class="input" id="email" name="email"
                        type="email" placeholder="you@example.com" value="{{ old('email') }}" required />
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <button class="btn btn-primary full" type="submit">Verify</button>
            </form>

        </div>
    </main>

@endsection
