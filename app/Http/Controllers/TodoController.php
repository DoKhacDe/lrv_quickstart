<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Http\Requests\TodoRequest;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        if (empty($request->search)) {
            $todo = Todos::where('user_id', Auth::id())->paginate(4);
            $count = $todo->count();
            return view('todolist.index', compact('todo', 'count'));
        } else {
            $search = $request->search;
            $todo = Todos::where('title', 'LIKE', '%'.$search.'%')
                ->where('user_id', Auth::id())
                ->paginate(4);
            $count = $todo->count();
            return view('todolist.index', compact('todo', 'count', 'search'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    return view('todolist.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoRequest $request)
    {
        $input = $request->all();
        $input['user_id'] = Auth::id();
        Todos::create($input);
        return redirect()->route('todos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function show(Todos $todos)
    {

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todos::findOrFail($id);
        return view('todolist.edit')->with(['id' => $id, 'todo' => $todo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function update(TodoRequest $request, $id)
    {
        $updateTodo = Todos::findOrFail($id);
        $update = $updateTodo->update([
            'title' => $request->title,
            'user_id' => Auth::id(),
            ]);
        if ($update) {
            return redirect()->route('todos.index');
        } else {
            return redirect()->route('todos.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todos::findOrFail($id);
        $todo->delete(); 
        return redirect()->back()->with('fail', __('content.Todo deleted Successfully!'));
    }
    public function completed($id) 
    {
        $todo = Todos::findOrFail($id);
        if ($todo->completed) {
            $todo->update(['completed' => false]);
            return redirect()->back()->with('success', __('content.Todo marked as incomplete!'));
        } else {
            $todo->update(['completed' => true]);
            return redirect()->back()->with('fail', __('content.Todo marked as complete!'));
        }
    }
}
