@extends('layouts.main')

@section('container')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-end pt-3 pb-2 mb-3 border-bottom">
    <h2>User Setting</h2>
    {{-- show today date --}}
    <h6 class="text-muted">{{ date('l, j F Y') }}</h6>
  </div>

  <div class="row">
    <div class="col-md-4">
      <form action="" method="post">
        @method('PUT')
        @csrf
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ auth()->user()->name }}">
        </div>
        <div class="mb-3">
          <label for="username" class="form-label">Username</label>
          <input type="text" class="form-control" id="username" name="username" value="{{ auth()->user()->username }}" disabled>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}">
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password">
        </div>
        <div class="mb-3">
          <label for="password_confirmation" class="form-label">Password Confirmation</label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Update Info</button>
      </form>
    </div>
    <div class="col-md-2">

    </div>
    <div class="col-md-4">
      {{-- Change password --}}
      <form action="" method="post">
        @method('PUT')
        @csrf
        <div class="mb-3">
          <label for="old_password" class="form-label">Old Password</label>
          <input type="password" class="form-control" id="old_password" name="old_password">
        </div>
        <div class="mb-3">
          <label for="new_password" class="form-label">New Password</label>
          <input type="password" class="form-control" id="new_password" name="new_password">
        </div>
        <div class="mb-3">
          <label for="new_password_confirmation" class="form-label">New Password Confirmation</label>
          <input type="password" class="form-control" id="new_password_confirmation" name="new_password_confirmation">
        </div>
        <button type="submit" class="btn btn-primary">Change Password</button>
    </div>
  </div>
@endsection
