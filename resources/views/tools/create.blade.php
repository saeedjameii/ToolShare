@extends('layout.master')

@section('nav-links')
<p></p>
@endsection

@section('header-actions')
    {{-- <a class="btn btn-secondary" href="{{ route('home') }}">Home</a> --}}
    <a class="browse-link" href="{{ route('home') }}">← Back to browse</a>
@endsection

@section('content')
<main class="page-area">
<div class="main-content">
<section class="intro">
  <p class="kicker">Share more. Waste less.</p>
  <h1 class="display-font">List a tool for rent</h1>
  <p class="intro-copy">Tell your neighbours about the useful tools ready for their next project. You can review every detail before publishing.</p>
</section>

<div class="workspace">
<form
    action="{{ route('create.post') }}"
    method="POST"
    enctype="multipart/form-data"
    id="listing-form"
>
@csrf
@if ($errors->any())
<div class="validation-message" style="display:block;margin-bottom:16px;">
    <ul style="margin:0;padding-inline-start:20px;">
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<section class="form-section">
<div class="section-heading"><span class="step-number">01</span><div><h2>Tool details</h2><p class="section-description">Help renters quickly understand what they are borrowing.</p></div></div>
<div class="field-grid">

<div class="field full-field">
<label for="tool-title">Tool title</label>
<input class="form-control" id="tool-title" name="title" type="text" maxlength="80" placeholder="e.g. Cordless drill">
<span class="validation-message" id="tool-title-error"></span>
</div>

<div class="field full-field">
<label for="description">Description</label>
<textarea class="form-control" id="description" name="description" maxlength="1000" placeholder="Describe what is included, what it is best for, and anything renters should know."></textarea>
<div class="counter-line"><span id="character-count">0 / 1000</span></div>
<span class="validation-message" id="description-error"></span>
</div>

<div class="field">
<label for="category">Category</label>
<select class="form-control" id="category" name="category_id">
<option value="">Select a category</option>
@foreach ($categories as $category)
<option value="{{ $category->id }}">{{ $category->title }}</option>
  
@endforeach
</select>
<span class="validation-message" id="category-error"></span>
</div>

<div class="field">
<label for="condition">Tool condition</label>
<select class="form-control" id="condition" name="condition">
<option value="">Select condition</option><option>New</option><option>Like new</option><option>Good</option><option>Fair</option>
</select>
<span class="validation-message" id="condition-error"></span>
</div>

<div class="field full-field">
<label for="location">Location</label>
<input class="form-control" id="location" name="location" type="text" maxlength="80" placeholder="e.g. Northside, near the station">
<span class="field-hint">Share a general pickup area, not your full address.</span>
<span class="validation-message" id="location-error"></span>
</div>
</div>
</section>

<section class="form-section">
<div class="section-heading"><span class="step-number">02</span><div><h2>Pricing &amp; availability</h2><p class="section-description">Set a simple daily price and choose when your tool can be picked up.</p></div></div>
<div class="field-grid">

<div class="field"><label for="first-day-price">Price for first day</label><div class="currency-wrap"><span class="currency-symbol">$</span><input class="form-control" id="first-day-price" name="first_day_price" type="number" min="0" step="0.01" placeholder="0"></div><span class="validation-message" id="first-day-error"></span></div>
<div class="field"><label for="extra-day-price">Price for each extra day</label><div class="currency-wrap"><span class="currency-symbol">$</span><input class="form-control" id="extra-day-price" name="extra_day_price" type="number" min="0" step="0.01" placeholder="0"></div><span class="validation-message" id="extra-day-error"></span></div>
<div class="field"><label for="available-start">Available from</label><input class="form-control" id="available-start" name="available_from" type="date"></div>
<div class="field"><label for="available-end">Available until</label><input class="form-control" id="available-end" name="available_untill" type="date"><span class="validation-message" id="date-error"></span></div>
</div>
</section>

<section class="form-section">
<div class="section-heading"><span class="step-number">03</span><div><h2>Photos</h2><p class="section-description">Bright, clear photos help your listing stand out.</p></div></div>
<label class="upload-zone" for="tool-photos">
<input id="tool-photos" name="images[]" type="file" accept="image/*" multiple>
<span><span class="upload-icon">＋</span><span class="upload-title">Drop photos here or choose files</span><span class="upload-copy">Choose up to 5 images. They are shown only in this preview and are not uploaded.</span></span>
</label>
<div id="thumbnail-strip" class="thumbnail-strip"></div>
<p id="photo-status" class="photo-status"></p>
</section>

<section class="form-section">
<div class="section-heading"><span class="step-number">04</span><div><h2>Rental notes</h2><p class="section-description">Optional details for a smoother handover.</p></div></div>
<div class="field"><label for="rental-notes">Notes for renters (optional)</label><textarea class="form-control" id="rental-notes" name="rental-notes" maxlength="400" placeholder="e.g. Please return the tool clean and fully charged."></textarea></div>
</section>

<div class="actions">
<button class="button button-primary" type="submit">List tool</button>
<p id="form-status" class="form-status"></p>
</div>
</form>

<aside class="preview-wrap">
<section class="preview-card">
<div class="preview-heading"><h2>Listing preview</h2><span class="preview-badge">Preview</span></div>
<div class="preview-image-box"><img id="preview-image" class="preview-image" alt="Tool preview" hidden><span class="tool-illustration">🔧</span></div>
<div class="preview-body">
<span id="preview-category" class="preview-category">Category</span>
<h3 id="preview-title" class="preview-title">Your tool title</h3>
<p id="preview-meta" class="preview-meta">Condition · Pickup location</p>
<div class="preview-price-box"><p class="preview-price-label">Rental price</p><p id="preview-price" class="preview-price">$0 first day · $0 extra day</p></div>
</div>
</section>
<p class="review-note"><span>✓</span><span>Your listing can be reviewed before it is published.</span></p>
</aside>
</div>
</div>
</main>
@endsection