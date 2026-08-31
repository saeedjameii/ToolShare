@extends('layout.master')

@section('title', 'Sign Up — ToolShare')


@section('nav-links')
<p></p>
@endsection

@section('header-actions')
    <a class="btn btn-secondary" href="{{ route('home') }}">Home</a>
    <a class="btn btn-primary" href="{{ route('login') }}">Log In</a>
@endsection

@section('content')
    <main class="auth-page">
        <div class="auth-card">
            <a class="logo auth-logo" href="index.html"><span class="logo-icon">🔧</span>ToolShare</a>
            <h1>Create your account</h1>
            <p class="auth-subtitle">
                Join the community and start borrowing or sharing tools.
            </p>
            <form action="{{ route('signUp.post') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="name">Full name</label><input class="input" id="name" name="name"
                        type="text" value="{{ old('name') }}" placeholder="John Doe" required />
                    <div>
                        @error('name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email address</label><input class="input" id="email" name="email"
                        type="email" value="{{ old('email') }}" placeholder="you@example.com" required />
                    <div>
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Password</label><input class="input" id="password" name="password"
                        type="password" placeholder="Create a password" required />
                    <div>
                        @error('password')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
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
                <label class="check-row"><input type="checkbox" required /> I agree to the Terms and
                    Conditions.</label><button class="btn btn-primary full" type="submit">
                    Create Account
                </button>
            </form>
            <div class="divider">OR</div>
            <button class="btn btn-secondary full" type="button">
                Continue with Google
            </button>
            <p class="auth-switch">
                Already have an account? <a href="{{ route('login') }}">Log In</a>
            </p>
        </div>
    </main>
@endsection
