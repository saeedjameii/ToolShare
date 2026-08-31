@extends('layout.master')
@section('title', 'Login — ToolShare')


@section('nav-links')
<p></p>
@endsection

@section('header-actions')
    <a class="btn btn-secondary" href="{{ route('home') }}">Home</a>
    <a class="btn btn-primary" href="{{ route('signUp') }}">Sign Up</a>
@endsection

@section('content')
    <main class="auth-page">
      <div class="auth-card">
        <a class="logo auth-logo" href="index.html"
          ><span class="logo-icon">🔧</span>ToolShare</a
        >
        <h1>Welcome back</h1>
        <p class="auth-subtitle">
          Log in to continue borrowing and sharing useful tools.
        </p>
        @if (session()->has('error'))
            <div class="text-danger">{{ session('error') }}</div>
        @endif
        @if (session()->has('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <form action="{{ route('login.post') }}" method="post">
            @csrf
          <div class="form-group">
            <label for="email">Email address</label
            ><input
              class="input"
              id="email"
              name="email"
              type="email"
              placeholder="you@example.com"
              value="{{ old('email') }}"
              required
            />
            @error('email')
                <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <div class="form-group">
            <div class="password-row">
              <label for="password">Password</label
              ><a class="small-link" href="#">Forgot password?</a>
            </div>
            <input
              class="input"
              id="password"
              name="password"
              type="password"
              placeholder="Enter your password"
              required
            />
            @error('password')
                <p class="text-danger">{{ $message }}</p>
            @enderror
          </div>
          <label class="check-row"
            ><input type="checkbox" name="remember" /> Remember me</label
          ><button class="btn btn-primary full" type="submit">Log In</button>
        </form>
        <div class="divider">OR</div>
        <button class="btn btn-secondary full" type="button">
          Continue with Google
        </button>
        <p class="auth-switch">
          Don't have an account? <a href="signup.html">Sign Up</a>
        </p>
      </div>
    </main>

@endsection