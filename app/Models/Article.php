<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'entry', 'premium'];

    protected $with = ['user'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function files() {
        return $this->hasMany(File::class);
    }

    public function categories() {
        return $this->belongsToMany(Category::class);
    }
}
