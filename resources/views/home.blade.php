@extends('layout.master')
@section('header-actions')
@if (auth()->check())
  {{ auth()->user()->name }} 
  <a class="btn btn-secondary" href="{{ route("logout") }}">Log Out</a>
@else
  <a class="btn btn-secondary" href="{{ route("login") }}">Log In</a>
  <a class="btn btn-primary" href="{{ route('signUp') }}">Sign Up</a>
@endif
@endsection
@section('content')
<main>
  <section class="hero">
    <div class="container hero-grid">
      <div>
        <div class="kicker">A community for useful things</div>
        <h1>Borrow what you need. Share what you have.</h1>
        <p>
          ToolShare makes it easy to borrow tools and equipment from people
          around you. Get the job done without buying something you only need once.
        </p>
        <div class="hero-buttons">
          <a class="btn btn-primary" href="tools.html">Browse Tools</a>
          <a class="btn btn-secondary" href="{{ route('create.post') }}">List Your Tool</a>
        </div>
      </div>
      <div class="hero-image">
        <img
          src="{{ asset('images/logo.png') }}"
          alt="Tools"
        />
      </div>
    </div>
  </section>

  <section id="how" class="section sage">
    <div class="container">
      <div class="kicker">How it works</div>
      <h2 class="section-title">Simple from start to finish.</h2>
      <div class="steps">
        <article class="step">
          <span class="step-number">01</span>
          <h3>Find a Tool</h3>
          <p>Search for the equipment you need and discover tools available near you.</p>
        </article>
        <article class="step">
          <span class="step-number">02</span>
          <h3>Request to Borrow</h3>
          <p>Choose your dates, send a request, and connect with the owner.</p>
        </article>
        <article class="step">
          <span class="step-number">03</span>
          <h3>Share &amp; Save</h3>
          <p>Borrow instead of buying, or list your own tools and earn from them.</p>
        </article>
      </div>
    </div>
  </section>

  <section class="section">
    <div class="container">
      <div class="section-head">
        <div>
          <div class="kicker">Popular tools</div>
          <h2 class="section-title">Tools people are sharing</h2>
        </div>
        <a class="btn btn-secondary" href="tools.html">View all tools</a>
      </div>
      <div class="tools-grid">            
     <article class="tool-card">
        <img
        class="tool-image"
        src="{{ asset('/images/photo-1504148455328-c376907d081c.jpg') }}"
        />
        <div class="tool-body">
        <span class="tag">Power Tools</span>
        <h3>Cordless Drill</h3>
        <p>Compact drill for home repairs and DIY projects.</p>
        <div class="card-bottom">
            <span class="price">$8 / day</span
            ><a href="details.html">View →</a>
        </div>
        </div>
    </article>
          </div>
    </div>
  </section>
</main>

@endsection