<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //
    public $fillable = ['title', 'description'];

    public function images(){
        return $this->hasMany(NotesImage::class);
    }
}
