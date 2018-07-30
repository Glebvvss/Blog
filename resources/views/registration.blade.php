@extends('layouts.main')

@section('content')
<div class="container content-top">

  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <p>If you want to leave comments then sign in.</p>
      <form method="POST" action="/registration-action">
        @csrf
        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Name</label>
            <input type="text" class="form-control" placeholder="name" name="name" value="{{ old('name') }}">
            <p class="help-block text-danger">{{ $errors->first('name') }}</p>
          </div>
        </div>

        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Email</label>
            <input type="text" class="form-control" placeholder="email" name="email" value="{{ old('email') }}">
            <p class="help-block text-danger">{{ $errors->first('email') }}</p>
          </div>
        </div>

        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Password</label>
            <input type="text" class="form-control" placeholder="password" name="password">
            <p class="help-block text-danger">{{ $errors->first('password') }}</p>
          </div>
        </div>

        <div class="control-group">
          <div class="form-group floating-label-form-group controls">
            <label>Confirm Password</label>
            <input type="password" class="form-control" placeholder="confirm password" name="confirm_password">
            <p class="help-block text-danger">{{ $errors->first('confirm_password') }}</p>
          </div>
        </div>
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