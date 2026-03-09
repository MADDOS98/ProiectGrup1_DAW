<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nume' => 'required|string|max:255',
            'descriere' => 'nullable|string',
            'stare' => 'required|in:In curs,Finalizata,Anulata'
        ]);

        Task::create($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Activitatea a fost creată cu succes.');
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('tasks.show', compact('task'));
    }

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nume' => 'required|string|max:255',
            'descriere' => 'nullable|string',
            'stare' => 'required|in:In curs,Finalizata,Anulata'
        ]);

        $task = Task::findOrFail($id);
        $task->update($validatedData);

        return redirect()->route('tasks.index')->with('success', 'Activitatea a fost actualizată cu succes.');
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->route('tasks.index')->with('success', 'Activitatea a fost ștearsă cu succes.');
    }
}
