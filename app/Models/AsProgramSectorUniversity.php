<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AsProgramSectorUniversity extends Model
{
    use HasFactory;
    protected $table = 'as_program_sector_universities';
    public function university(): BelongsTo{
        return $this->belongsTo(University::class);
    }

    public function sector(): BelongsTo{
        return $this->belongsTo(University::class);
    }
    public function program(): BelongsTo{
        return $this->belongsTo(University::class);
    }
}
