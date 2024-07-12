<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

class Recette extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        'nom', 'image', 'video', 'description', 'preparationTime', 'cookingTime', 'nbCalories', 'difficulte'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ingredients(): HasMany
    {
        return $this->hasMany(Ingredient::class);
    }

    public function etapes(): HasMany
    {
        return $this->hasMany(Etape::class);
    }

    public function links(): HasMany
    {
        return $this->hasMany(Link::class);
    }

    public function commentaires(): HasMany
    {
        return $this->hasMany(Commentaire::class);
    }

    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::url($this->image) : null;
    }
}
