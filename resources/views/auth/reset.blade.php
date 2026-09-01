@extends('layout.master')
@section('title', 'Login — ToolShare')


@section('nav-links')
    <p></p>
@endsection

@section('content')
    <main class="auth-page">
        <div class="auth-card">
            <a class="logo auth-logo" href="index.html"><span class="logo-icon">🔧</span>ToolShare</a>
            <h1>Change Your Password</h1>
            <p class="auth-subtitle">
                Change your password to continue borrowing and sharing useful tools.
            </p>
            @if (session()->has('error'))
                <div class="text-danger">{{ session('error') }}</div>
            @endif
            @if (session()->has('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <form action="{{ route('resetPassword.post') }}" method="post">
                @csrf
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group">
                    <div class="password-row">
                        <label for="password">New Password</label>
                    </div>
                    <input class="input" id="password" name="password" type="password" placeholder="Enter a new password" required />
                    @error('password')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm password</label><input class="input"
                        id="password_confirmation" name="password_confirmation" type="password"
                        placeholder="Repeat your password" required />
                    <div>
                        @error('password_confirmation')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <button class="btn btn-primary full" type="submit">Submit</button>
            </form>
        </div>
    </main>

@endsection
