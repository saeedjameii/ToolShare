<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <title>@yield('title', 'ToolShare — Borrow more. Buy less.')</title>
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/style.css', 'resources/js/create-post.js'])
    @else
        <style>
            :root{--ink:#1f2d23;--forest:#295d43;--forest-dark:#1d4934;--sage:#eaf1e5;--paper:#f8f6f0;--cream:#fffdf8;--muted:#657268;--line:#dce4d7}
            *{box-sizing:border-box}html{scroll-behavior:smooth}body{margin:0;background:var(--paper);color:var(--ink);font-family:Arial,Helvetica,sans-serif}a{text-decoration:none;color:inherit}.container{width:min(1120px,calc(100% - 40px));margin:auto}.navbar{height:76px;background:rgba(255,253,248,.96);border-bottom:1px solid var(--line);display:flex;align-items:center}.nav-inner{display:flex;align-items:center;justify-content:space-between}.logo{display:flex;align-items:center;gap:10px;font-weight:700;font-size:21px}.logo-icon{width:38px;height:38px;border-radius:11px;background:var(--forest);color:#fff;display:grid;place-items:center}.nav-links{display:flex;gap:28px;color:#506056;font-weight:600;font-size:14px}.nav-actions{display:flex;gap:10px;align-items:center}.btn{display:inline-flex;align-items:center;justify-content:center;border-radius:12px;padding:12px 18px;font-weight:700;font-size:14px;border:1px solid transparent;cursor:pointer}.btn-primary{background:var(--forest);color:#fff}.btn-primary:hover{background:var(--forest-dark)}.btn-secondary{background:var(--cream);border-color:#b9c8b6;color:var(--forest)}.hero{padding:90px 0 105px}.hero-grid{display:grid;grid-template-columns:1fr 1fr;gap:70px;align-items:center}.kicker{font-size:12px;letter-spacing:2px;text-transform:uppercase;color:var(--forest);font-weight:700}.hero h1,.section-title,.auth-card h1,.detail-title{font-family:Georgia,serif;letter-spacing:-1.5px}.hero h1{font-size:58px;line-height:1.04;margin:18px 0}.hero p{font-size:18px;line-height:1.8;color:var(--muted);max-width:570px}.hero-buttons{display:flex;gap:12px;margin-top:30px}.hero-image{height:500px;border-radius:24px;overflow:hidden;background:#dce8d7}.hero-image img,.tool-image,.detail-image{width:100%;height:100%;object-fit:cover}.section{padding:80px 0}.section.sage{background:var(--sage)}.section-head{display:flex;justify-content:space-between;align-items:end;gap:20px;margin-bottom:32px}.section-title{font-size:42px;margin:8px 0}.steps,.tools-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:22px}.step,.tool-card{background:var(--cream);border:1px solid var(--line);border-radius:20px;padding:25px}.step-number{width:42px;height:42px;border-radius:13px;background:#f9e6c6;color:#935a0f;display:grid;place-items:center;font-weight:700}.step h3,.tool-card h3{margin:18px 0 8px}.step p,.tool-card p{color:var(--muted);line-height:1.6}.tools-grid{grid-template-columns:repeat(4,1fr)}.tool-card{padding:0;overflow:hidden}.tool-image{height:190px}.tool-body{padding:18px}.tag{display:inline-block;background:#edf3e9;color:var(--forest);padding:5px 9px;border-radius:999px;font-size:11px;font-weight:700}.card-bottom{display:flex;justify-content:space-between;align-items:center;margin-top:18px}.price{color:var(--forest);font-weight:700}.footer{background:var(--ink);color:#c9d5c7;padding:32px 0}.footer-inner{display:flex;justify-content:space-between;gap:20px}.auth-page{min-height:calc(100vh - 76px);display:grid;place-items:center;padding:50px 20px;background:radial-gradient(circle at 10% 10%,#e5f0dd,transparent 30%),var(--paper)}.auth-card{width:min(100%,460px);background:var(--cream);border:1px solid #dfe5d9;border-radius:24px;padding:38px;box-shadow:0 18px 50px rgba(31,45,35,.09)}.auth-logo{justify-content:center;margin-bottom:28px}.auth-card h1{text-align:center;font-size:34px;margin:0 0 10px}.auth-subtitle{text-align:center;color:var(--muted);margin:0 0 28px;line-height:1.6}.form-group{margin-bottom:18px}.form-group label{display:block;font-size:14px;font-weight:700;margin-bottom:8px}.input{width:100%;padding:13px 14px;border:1px solid #cbd5c8;border-radius:12px;background:#fffdf8;font:inherit;outline:none}.input:focus{border-color:var(--forest);box-shadow:0 0 0 3px rgba(41,93,67,.12)}.password-row{display:flex;justify-content:space-between;align-items:center;margin-bottom:8px}.password-row label{margin:0}.small-link{font-size:13px;color:var(--forest);font-weight:700}.check-row{display:flex;gap:8px;align-items:center;font-size:13px;color:var(--muted);margin:6px 0 22px}.full{width:100%}.divider{display:flex;align-items:center;gap:12px;color:#89948c;font-size:12px;margin:24px 0}.divider:before,.divider:after{content:"";height:1px;background:var(--line);flex:1}.auth-switch{text-align:center;color:var(--muted);font-size:14px;margin-top:22px}.auth-switch a{color:var(--forest);font-weight:700}.browse-header{padding:70px 0 25px}.search-box{background:var(--cream);border:1px solid var(--line);border-radius:18px;padding:14px;display:grid;grid-template-columns:2fr 1fr 1fr 1fr;gap:10px;margin:30px 0}.select,.search{width:100%;padding:13px;border:1px solid #cbd5c8;border-radius:11px;background:#fffdf8;font:inherit}.browse-grid{display:grid;grid-template-columns:repeat(4,1fr);gap:22px;padding-bottom:80px}.details{padding:70px 0}.detail-grid{display:grid;grid-template-columns:1.1fr .9fr;gap:55px;align-items:start}.detail-image{height:520px;border-radius:22px}.thumbs{display:flex;gap:10px;margin-top:12px}.thumb{width:78px;height:64px;object-fit:cover;border-radius:10px;border:2px solid transparent}.thumb.active{border-color:var(--forest)}.detail-title{font-size:48px;margin:20px 0 10px}.detail-meta{color:var(--muted);margin-bottom:22px}.price-box{background:#f0f5ed;border-radius:17px;padding:20px;margin:22px 0}.detail-price{font-size:30px;font-weight:700}.detail-actions{display:flex;gap:10px}.detail-section{margin-top:55px}.spec-row{display:flex;justify-content:space-between;padding:15px 0;border-bottom:1px solid var(--line)}.owner{background:var(--cream);border:1px solid var(--line);border-radius:18px;padding:24px}@media(max-width:850px){.nav-links{display:none}.hero-grid,.detail-grid{grid-template-columns:1fr}.hero{padding:55px 0}.hero h1{font-size:44px}.hero-image{height:350px}.tools-grid,.browse-grid{grid-template-columns:repeat(2,1fr)}.steps{grid-template-columns:1fr}.search-box{grid-template-columns:1fr}.footer-inner{flex-direction:column}}@media(max-width:520px){.container{width:min(100% - 28px,1120px)}.nav-actions .btn-secondary{display:none}.tools-grid,.browse-grid{grid-template-columns:1fr}.auth-card{padding:25px}.detail-title{font-size:38px}.detail-image{height:340px}} .text-danger{ color: red; }
        </style>
    @endif
  </head>
  <body>
    <header class="navbar">
      <nav class="container nav-inner">
        <a class="logo" href="{{ route('home') }}">
             <span class="logo-icon">🔧</span>ToolShare</a>
        @hasSection('nav-links')
          @yield('nav-links')
        @else
          <div class="nav-links">
            <a href="{{ route('home') }}">Home</a>
            <a href="tools.html">Browse Tools</a>
            <a href="#how">How It Works</a>
          </div>
        @endif
        <div class="nav-actions">
          @hasSection('header-actions')
            @yield('header-actions')
          @else
            <a class="btn btn-secondary" href="{{ route("login") }}">Log In</a>
            <a class="btn btn-primary" href="{{ route('signUp') }}">Sign Up</a>
          @endif
        </div>
      </nav>
    </header>
