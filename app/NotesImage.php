<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\File;


class NotesImage extends Model
{
    protected $guarded = [];

    public function deleteFile(){
        if(file_exists($this->img_path))
            unlink($this->img_path);
    }

}
