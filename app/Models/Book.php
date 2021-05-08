<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $table = "book";
    
    protected $primaryKey = 'id';
    
    public $timestamps = false;

    protected $appends = ['authorId'];

    protected $hidden = ['author_id'];

    public function getAuthorIdAttribute(){
        return $this->attributes['author_id'];
    }

    public function author()
    {
        return $this->belongsTo('App\Models\Author');
    }
}
