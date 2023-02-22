@include('layouts.includes.header')


@extends('layouts.auth-master')


@include('layouts.partials.messages')


<div class="login-box">
    {{-- <input type="hidden" name="_token" value="{{ csrf_token() }}" /> --}}
    <h2>Login</h2>
    <form method="post" action="{{ route('login.perform') }}">
        @csrf
        <div class="user-box">
            <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username"
                autofocus>
            <label for="floatingName"></label>
            @if ($errors->has('username'))
                <span class="text-danger text-left">{{ $errors->first('username') }}</span>
            @endif
        </div>
        <div class="user-box">
            <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                placeholder="Password">
            <label for="floatingPassword"></label>
            @if ($errors->has('password'))
                <span class="text-danger text-left">{{ $errors->first('password') }}</span>
            @endif

        </div>
        <div class="button-form">
            <button type="submit" id="submit" href="{{ route('login.perform') }}">Login</button>

        </div>
        {{-- @include('auth.partials.copy') --}}
    </form>
    <form method="get" action="{{ route('register.perform') }}">
        <div id="register">
            Don't have an account ?
            <button href="{{ route('register.perform') }}">Register</button>

        </div>
    </form>

</div>

@include('layouts.includes.footer')
