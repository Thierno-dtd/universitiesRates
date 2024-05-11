<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Avis extends Model
{
    use HasFactory;
    protected $table = 'avis';

    public function university(): BelongsTo{
        return $this->belongsTo(University::class);
    }

    public function user(): BelongsTo{
        return $this->belongsTo(University::class);
    }

    public function filial(): BelongsTo{
        return $this->belongsTo(University::class);
    }
    public function critere(): BelongsTo{
    return $this->belongsTo(University::class);
}
}
