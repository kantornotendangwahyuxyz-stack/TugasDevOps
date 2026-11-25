<?php

namespace App\Http\Controllers;

use App\Models\DevopsTask;
use Illuminate\Http\Request;

class DevopsTaskController extends Controller
{
    /**
     * Display a listing of the DevOps tasks.
     */
    public function index()
    {
        $tasks = DevopsTask::latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    /**
     * Store a newly created task in storage using Eloquent.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'assigned_to' => 'nullable|string|max:255',
        ]);

        DevopsTask::create([
            'title' => $validated['title'],
            'description' => $validated['description'] ?? 'Tugas Baru DevOps',
            'assigned_to' => $validated['assigned_to'] ?? 'ELIA KHOLIFATUS SAADAH',
            'status' => 'pending',
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tugas DevOps berhasil ditambahkan!');
    }

    /**
     * Update the status of a DevOps task using Eloquent.
     */
    public function updateStatus(Request $request, DevopsTask $task)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $task->update(['status' => $validated['status']]);

        return redirect()->route('tasks.index')->with('success', 'Status tugas berhasil diperbarui!');
    }

    /**
     * Delete a task using Eloquent.
     */
    public function destroy(DevopsTask $task)
    {
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tugas berhasil dihapus!');
    }
}
