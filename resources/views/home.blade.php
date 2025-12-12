@extends('layout')

@section('content')
<div class="py-5 text-center">
  <h1 class="display-5">Welcome to My Website</h1>
  <p class="lead">Simple portfolio built with Laravel + Bootstrap — fast, responsive, and easy to edit.</p>
  <p>
    <a class="btn btn-primary me-2" href="/portfolio">See my work</a>
    <a class="btn btn-outline-secondary" href="/about">About me</a>
  </p>
</div>

<div class="row g-4">
  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Why this site</h5>
        <p class="card-text">A minimal portfolio to show projects, contact details, and simple info.</p>
      </div>
    </div>
  </div>

  <div class="col-md-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Next steps</h5>
        <p class="card-text">You can replace the project cards, connect a database, or enable emailing from the contact form.</p>
      </div>
    </div>
  </div>
</div>
@endsection
