<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'commments';

    public function user(): BelongsTo{
        return $this->belongsTo(University::class);
    }

    public function university(): BelongsTo{
        return $this->belongsTo(University::class);
    }
}
