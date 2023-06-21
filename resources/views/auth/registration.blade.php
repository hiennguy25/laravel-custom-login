@extends('auth.layout')
@section('title', 'Registraiton')
@section('content')
<div class="row">
    <div class="col-md-4 col-md-offset-4" style="margin-top: 20px;">
        <h4>Registration</h4>
        <hr>
        <form action="{{ route('register-user') }}" method="post">
            @csrf
            @if (Session::has('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
            @endif
            @if (Session::has('fail'))
                <div class="alert alert-danger">{{ Session::get('fail') }}</div>
            @endif
            <div class="form-group">
                <label for="name">Full Name</label>
                <input type="text" name="name" class="form-control" placeholder="Enter Full Name" value="{{ old('name') }}">
                @error('name')
                    <div class="text-danger alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Email</label>
                <input type="text" name="email" class="form-control" placeholder="Enter Email" value="{{ old('email') }}">
                @error('email')
                    <div class="text-danger alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            <div class="form-group">
                <label for="name">Password</label>
                <input type="password" name="password" class="form-control" placeholder="Enter Password" value="{{ old('password') }}">
                @error('password')
                    <div class="text-danger alert alert-danger">{{ $message }} </div>
                @enderror
            </div>
            <div class="form-group"><button class="btn btn-primary">Registration</button></div>
        </form>
        <a href="login">Registered User !! Login Here.</a>
    </div>
</div>
@endsection
