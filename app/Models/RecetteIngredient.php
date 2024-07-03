<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RecetteIngredient extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function recette(): BelongsTo
    {
        return $this->belongsTo(Recette::class);
    }
    
    public function ingredient(): BelongsTo
    {
        return $this->belongsTo(Ingredient::class);
    }
}
