<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Infrastructure extends Model
{
    use HasFactory;
    protected $table = 'infrastructures';
    public function university(): BelongsTo{
        return $this->belongsTo(University::class);
    }
}
