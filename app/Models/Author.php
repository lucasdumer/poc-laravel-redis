<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table = "author";

    protected $primaryKey = 'id';
    
    public $timestamps = false;

    public function books()
    {
        return $this->hasMany('App\Model\Book', 'author_id', 'id');
    }
}
