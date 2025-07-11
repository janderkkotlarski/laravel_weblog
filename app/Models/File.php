<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $fillable = ['name', 'file_path'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function article() {
        return $this->belongsTo(Article::class);
    }
}
