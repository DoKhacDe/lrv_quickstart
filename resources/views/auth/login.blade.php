@extends('layouts.login_register')
    @section('login_register_content')
                <h4 style="text-align: center;">{{ __('content.Login') }}</h4>
                <form action="{{ route('auth.checkLogin') }}" method="post">
                    @if (Session::get('fail'))
                    <div class="alert alert-danger">
                        {{ Session::get('fail') }}
                    </div>
                    @endif
                    @csrf
                    <div class="form-group">
                        <label>{{ __('content.Email Address') }}</label>
                        <input type="text" class="form-control" name="email" placeholder="{{ __('content.Email Address') }}" value="{{ old('email') }}">
                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label>{{ __('content.Password') }}</label>
                        <input type="password" class="form-control" name="password" placeholder="{{ __('content.Password') }}">
                        <span class="text-danger">@error('password') {{ $message }} @enderror</span>
                    </div>
                    <br>
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-block btn-success">{{ __('content.Sign In') }}</button>
                    </div>
                    <br>
                    <a href="{{ route('auth.register') }}">{{ __("content.I don't have account, create new!") }}</a>
                </form>
    @endsection