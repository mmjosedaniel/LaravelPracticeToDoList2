<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;

class TaskController extends Controller
{
    public function index() {
        $tasks = Task::all();

        return view('todolist', [
            'tasks' => $tasks
        ]);
    }

    public function store(Request $request) {
        $validData = $request->validate([
            'task' => 'required|string'
        ]);
        
        $task = new Task;
        $task->task = ucfirst($validData['task']);
        $task->save();

        return redirect('/');
    }

    public function edit($id) {
        $task = Task::findOrFail($id);

        return view ('edit', [
            'task'=> $task
        ]);
    }

    public function update(Request $request, $id) {
        $validData = $request->validate([
            'task' => 'required|string'
        ]);

        $task = Task::findOrFail($id);
        $task->task = ucfirst($validData['task']);
        $task->save();

        return redirect('/');
    }

    public function delete($id) {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect('/');
    }
}
