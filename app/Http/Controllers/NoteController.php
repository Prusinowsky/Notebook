<?php

namespace App\Http\Controllers;

use App\Note;
use App\NotesImage;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function index(){
      $notes = Note::all();
      return view('note.index', compact('notes'));
    }

    public function create(){
      return view('note.create');
    }

    public function store(){
      $note = Note::create(Request()->validate([
        'title' => 'required|min:5',
        'description' => 'required|min:10'
      ]));
      $notes = Note::all();
      $messege = "Dodano nową notatkę.";
      return redirect('/');
    }

    public function edit(Note $note){
      return view('note.edit', compact('note'));
    }

    public function update(Note $note){
      $validatedNote = Request()->validate([
        'title' => 'required|min:5',
        'description' => 'required|min:10'
      ]);
      $note->update($validatedNote);
      return redirect('/');
    }

    public function destroy(Note $note){
        $note->images()->delete();
        $note->delete();
        return redirect('/');
    }
}
