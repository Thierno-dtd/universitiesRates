<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Filial extends Model
{
    use HasFactory;
    protected $table = 'filials';
public function university(): BelongsTo{
    return $this->belongsTo(University::class);
}

    public function avis(): BelongsTo{
        return $this->belongsTo(University::class);
    }
}
