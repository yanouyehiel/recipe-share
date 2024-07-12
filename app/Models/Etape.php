<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Etape extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $casts = [
        'etapes' => 'array',
    ];
    protected $fillable = [
        'description', 'sort', 'recette_id'
    ];

    protected function casts(): array
    {
        return ['description' => 'array',];
    }

    public function recette(): BelongsTo
    {
        return $this->belongsTo(Recette::class);
    }
}
