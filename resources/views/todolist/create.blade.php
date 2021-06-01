@extends('layouts.todo')
    @section('content')
    <div class="contaner">
        <div class="row">
            <div class="addnew">
                <h3>{{ __('content.Add new') }}</h3>
                <form action="{{ route('todos.store') }}" method="post"> 
                    @csrf
                    <input type="text" name="title" ><input type="submit" value="{{ __('content.Add') }}"><br>
                    <span class="text-danger">@error('title'){{ $message }} @enderror</span> 
                </form>
                <br>
                <a href="/todos">{{ __('content.Back') }}</a>
            </div>
        </div>
    </div>
    @endsection