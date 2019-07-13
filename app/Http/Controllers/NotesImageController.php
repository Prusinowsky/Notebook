<?php

namespace App\Http\Controllers;

use App\Note;
use App\NotesImage;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;


class NotesImageController extends Controller
{
    //
    public function upload(Note $note){
        return view('note.upload', compact('note'));
    }

    public function store(Request $request, Note $note){
       $request->validate([
            'image' => 'required|image|mimes:jpeg,jpg,png,gif'
        ]);

       $imageName = time().'.'.request()->image->getClientOriginalExtension();

       request()->image->move(storage_path('app/images'),  $imageName);

       NotesImage::create([
           'note_id' => $note->id,
           'img_url' => url('images', $imageName),
           'img_path' => storage_path('app/images/'.$imageName)
       ]);

       return back()->with('message', 'Zdjęcie zostało dodane.');
    }

    public function download(Note $note){
        $url = request(['image_url'])['image_url'];
        $info = pathinfo($url);
        $contents = file_get_contents($url);
        $imageName = 'images/'.time().'.jpg';
        Storage::put($imageName, $contents);
        $path = Storage::path($imageName);

        NotesImage::create([
            'note_id' => $note->id,
            'img_url' => url($imageName),
            'img_path' => $path
        ]);

        return back()->with('message', 'Zdjęcie zostało dodane.');
    }

    public function destroy(NotesImage $notesImage){
        $notesImage->deleteFile();
        $notesImage->delete();
        return back()->with('message', 'Zdjęcie zostało usunięte.');
    }

}
