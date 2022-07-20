<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'rumah_sakit',
        'tanggal_vaksin',
        'jenis_vaksin',
        'kuota',
        'url_rs',
        'review',
        'tags',
        'rating',
        'user_id'
    ];
    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'review_tag', 'review_id', 'tag_id');
    }
}
