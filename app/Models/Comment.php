<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory, HasUlids;
    protected $fillable = ['comment', 'user_id', 'commentable_id', 'commentable_type'];

    // Relation with User model
    public function user() : BelongsTo {
        return $this->belongsTo(User::class);
    }

}
