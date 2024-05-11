<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class University extends Model
{
    use HasFactory;
    protected  $fillable=['name','website','location','description','haveFiliale','image'];

    public function avis():HasMany{
        return $this->hasMany(Avis::class);
    }
    public function filial():HasMany{
        return $this->hasMany(Filial::class);
    }
    public function infrastructure():HasMany{
        return $this->hasMany(Filial::class);
    }

    public function asPSU():HasMany{
        return $this->hasMany(Filial::class);
    }
    public function comment():HasMany{
        return $this->hasMany(Filial::class);
    }
}


