<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    //
    public $guarded = ['id'];

    public function delete()
    {
        $images = $this->images()->get();
        foreach($images as $image){
            $image->delete();
        }
        return parent::delete();
    }

    public function images(){
        return $this->hasMany(NotesImage::class);
    }

    public function user(){
        return  $this->belongsTo(User::class )->get();
    }

    public function isAuthor(){
        return (bool)($this->user_id == auth()->id());
    }

    public function isNotAuthor(){
        return !$this->isAuthor();
    }
}
