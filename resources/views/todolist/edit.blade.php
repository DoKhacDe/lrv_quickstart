@extends('layouts.todo')
    @section('content')
    <div class="contaner">
        <div class="row">
            <div class="edit">
                <h3>{{ __('content.Edit') }}</h3>
                <form action="{{ route('todos.update', $todo->id) }}" method="post">
                    @method('put')
                    @csrf
                    <input type="text" name="title" value="{{ $todo->title }}">
                    <input type="number" name="id" style="display: none;" value="{{ $todo->id }}">
                    <input type="submit" value="{{ __('content.Edit') }}"><br>
                    <span class="text-danger">@error('title'){{ $message }} @enderror</span> 
                </form>
                <br>
                <a href="/todos">{{ __('content.Back') }}</a>
            </div>
        </div>
    </div>
@endsection