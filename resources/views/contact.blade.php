@extends('layouts.main')

@section('content')
<div class="container content-top">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <p>Want to get in touch? Fill out the form below to send me a message and I will get back to you as soon as possible!</p>
      <form name="sentMessage" id="contactForm" novalidate>
        
        @if( Auth::check() === false )
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Email Address</label>
            <input type="email" class="form-control" placeholder="Email Address" id="email" required data-validation-required-message="Please enter your email address.">
            <p class="help-block text-danger"></p>
          </div>
        </div>
        @endif

        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Message</label>
            <textarea rows="5" class="form-control" placeholder="Message" id="message" required data-validation-required-message="Please enter a message."></textarea>
            <p class="help-block text-danger"></p>
          </div>
        </div>
        <br>
        <div id="success"></div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary" id="sendMessageButton">Send</button>
        </div>
      </form>
    </div>
  </div>
</div>

<hr>
@endsection