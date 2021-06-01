@extends('layouts.todo')
    @section('content')
    <div class="container-fluied">
        <div class="content">
            <div class="menu-left">           
            </div>
            <div class="content-right">
                <h4>{{ __('content.Daily work') }} </h4>
                <a href="todos/create">{{ __('content.Add new') }}</a><br>
                @if (Session::get('success'))
                <div class="alert alert-danger">
                    {{ Session::get('success') }}
                </div>
                @endif
                @if (Session::get('fail'))
                <div class="alert alert-success">
                    {{ Session::get('fail') }}
                </div>
                @endif
                <h3 style="text-align:left; padding-left:30px">Total: {{ $count }}</h3>
                <div>
                <form class="form-inline my-2 my-lg-0" action="{{ route('todos.index') }}" method="GET">
                    @csrf
                    <input class="form-control mr-sm-2" type="search" name="search" placeholder="Search" aria-label="Search" >
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form>
                @if (isset($search))
                <span>Kết quả tìm kiếm: {{ $search }}...</span>
                @endif
                </div>
            <table class="table table-hover">
                <tr style="background: #99FFCC;">
                    <td>{{ __('content.Title') }}</td>
                    <td>{{ __('content.Status') }}</td>
                    <td>{{ __('content.Edit') }}</td>
                    <td>{{ __('content.Delete') }}</td>
                </tr>
               @foreach ($todo as $res)
                <tr>
                    <td>
                    @if ($res->completed)
                        <span style="text-decoration: line-through; color:red">{{ $res->title }}</span>
                    @else
                    {{ $res->title }}
                    @endif
                    </td>
                    @if ($res->completed)
                    <td><a href="{{ asset('/' . $res->id). '/todos' }}" >{{ __('content.Completed') }}</a></td>
                    @else
                    <td><a href="{{ asset('/' . $res->id). '/todos' }}" >{{ __('content.Incompleted') }}</a></td>
                    @endif
                    <td><a href="{{ route('todos.edit', $res->id) }}">{{ __('content.Edit') }}</a></td>
                    <td>
                        <form action="{{ route('todos.destroy', $res->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button id="deleteTask" class="btn btn-danger" onclick="confirm('Are you sure you want to delete this?')">{{ __('content.Delete') }}</button>
                        </form>
                    </td>
                </tr>
               @endforeach
            </table>
                {{ $todo->links() }}
            </div>
        </div>
    </div>
@endsection
