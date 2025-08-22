<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Movie extends Model
{
    use HasFactory, Searchable;

    protected $table = 'movies';
    protected $primaryKey = 'id';
    protected $fillable = ['title', 'description', 'author', 'release_year'];

    public function toSearchableArray(): array
    {
        return array_merge($this->toArray(), [
            'id' => (string) $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'author' => $this->author,
            'release_year' => (string) $this->release_year,
            'created_at' => $this->created_at->timestamp,
        ]);
    }
}
