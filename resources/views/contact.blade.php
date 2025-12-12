@extends('layout')

@section('content')
<div class="py-4">
  <h1>Contact Me</h1>
  <p>Send a message and I'll get back to you.</p>

  <form method="POST" action="/contact/send" class="row g-3">
    @csrf

    <div class="col-md-6">
      <label class="form-label">Name</label>
      <input name="name" value="{{ old('name') }}" class="form-control" required>
    </div>

    <div class="col-md-6">
      <label class="form-label">Email</label>
      <input name="email" type="email" value="{{ old('email') }}" class="form-control" required>
    </div>

    <div class="col-12">
      <label class="form-label">Message</label>
      <textarea name="message" class="form-control" rows="6" required>{{ old('message') }}</textarea>
    </div>

    <div class="col-12">
      <button class="btn btn-primary">Send</button>
    </div>
  </form>
</div>
@endsection
