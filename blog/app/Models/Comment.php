<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    /** @use HasFactory<\Database\Factories\CommentFactory> */
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "comment"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
