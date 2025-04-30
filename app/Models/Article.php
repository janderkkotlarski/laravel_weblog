<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'entry'];

    public function comments() {
        return $this->hasMany(Comment::class);
    }
}
