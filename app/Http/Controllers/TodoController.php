<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $todos = Todo::all();
        return view('todo.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        try {
            Todo::create(array_merge($data, [
                'slug' => Str::slug($data['name'])
            ]));
            return redirect()->route('todos.index')->with('success', 'Create post successfully');
        } catch (\Throwable $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
        return view('todo.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //
        return view('todo.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //
        $data = $request->validate([
            'name' => 'required',
            'description' => 'required'
        ]);
        try {
            $todo->update($data);
            return redirect()->route('todos.index')->with('success', 'Update post successfully');
        } catch (\Throwable $ex) {
            return redirect()->back()->with('error', $ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
        $todo->delete();
        return redirect()->route('todos.index')->with('success', 'Delete successfully!');
    }

    public function complete(Todo $todo){
        $todo->update(['completed' => true]);
        return redirect()->route('todos.index')->with('success', 'Mark complete successfully!');
    }
}
