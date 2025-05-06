<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Providers\AppServiceProvider;

class NoteController extends Controller
{
    public function index(): View
    {
        $notes = Note::with('user')->latest()->paginate(5);
        return view('notes.index', compact('notes'));
    }

    // Type definition needed for reading the data
    public function show(Note $note): View
    {
        return view('notes.show', compact('note'));
    }

    public function store()
    {
        request()->validate([
            'body' => ['required']
        ]);
        Note::create([
            'body' => request('body'),
            // Auth::user() obtains the current session's user
            'user_id' => 1
        ]);
        return redirect('/notes');
    }

    public function create(): View
    {
        return view('notes.create');
    }

    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    public function update(Note $note)
    {
        Gate::authorize('edit-note', $note);
        request()->validate([
            'body' => ['required']
        ]);

        $note->update([
            'body' => request('body'),
            'user_id' => 1,
        ]);
        return redirect('/notes' . $note->id);
    }

    public function destroy(Note $note)
    {
        Gate::authorize('edit-note', $note);

        $note->delete();
        return redirect('/notes');
    }
}
