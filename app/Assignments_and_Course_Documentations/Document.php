<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    //
    protected $table = 'Document';
    protected $fillable = ['doc_url', 'course_id'];
    // boolean $timestamps = false;
}
