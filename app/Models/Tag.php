<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    
    public function reviews() {
        return $this->belongsToMany(Review::class, 'review_tag', 'tag_id', 'review_id');
    }
}
