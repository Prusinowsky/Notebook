<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $notes = Note::all()->where('user_id' , Auth::id());
        return view('note.index', compact('notes'));
    }

    public function create(){
        return view('note.create');
    }

    public function store(){
        $validated = Request()->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:10'
        ]);
        $validated['user_id'] = Auth::id();
        Note::create($validated);
        return redirect('/');
    }

    public function edit(Note $note){
        if($note->isNotAuthor()) abort(403);
        return view('note.edit', compact('note'));
    }

    public function update(Note $note){
        if($note->isNotAuthor()) abort(403);
        $validatedNote = Request()->validate([
            'title' => 'required|min:5',
            'description' => 'required|min:10'
        ]);
        $note->update($validatedNote);
        return redirect('/');
    }

    public function destroy(Note $note){
        if($note->isNotAuthor()) abort(403);
        $note->delete();
        return redirect('/');
    }
}
