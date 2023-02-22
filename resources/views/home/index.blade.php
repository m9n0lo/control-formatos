@include('layouts.includes.header')

@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-5 rounded">
        @auth
        <h1>Dashboard</h1>
        <p class="lead">Only authenticated users can access this section.</p>
        <a class="btn btn-lg btn-primary" href="https://codeanddeploy.com" role="button">View more tutorials here &raquo;</a>
        @endauth

        @guest
        <h1>Homepage</h1>
        <p class="lead">Your viewing the home page. Please login to view the restricted data.</p>
        @endguest
    </div>

    <div class="login-box">
        {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
        <h2>Login</h2>
        <form method="post" action="{{ route('login.perform') }}">
            @csrf
            <div class="user-box">
                <input type="text" class="form-control" name="username" value="{{ old('username') }}"
                    placeholder="Username" required="required" autofocus>
                <label for="floatingName"></label>
                @if ($errors->has('username'))
                    <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                @endif
            </div>
            <div class="user-box">
                <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                    placeholder="Password" required="required">
                <label for="floatingPassword"></label>
                @if ($errors->has('password'))
                    <span class="text-danger text-left">{{ $errors->first('password') }}</span>
                @endif
    
            </div>
            <div class="button-form">
                <button type="submit"  id="submit" href="{{ route('login.perform') }}">Login</button>
                <div id="register">
                    Don't have an account ?
                    <button href="{{ route('register.perform') }}">Register</button>
    
                </div>
            </div>
            
        </form>
    
    
    </div>
@endsection