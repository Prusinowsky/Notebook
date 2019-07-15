<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class NotesImage extends Model
{
    protected $guarded = [];

    public function note(){
        return $this->belongsTo(Note::class)->first();
    }

    public function delete()
    {
        $this->deleteFile();
        return parent::delete();
    }

    public function deleteFile(){
        if(file_exists($this->img_path))
            unlink($this->img_path);
    }

}
