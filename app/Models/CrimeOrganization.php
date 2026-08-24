<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CrimeOrganization extends Model
{
    protected $fillable = [
        'crime_category_id',
        'name',
        'description',
        'image',
        'discord_url',
        'sort_order',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(CrimeCategory::class, 'crime_category_id');
    }

    public function imageUrl(): string
    {
        return LegalJob::resolveImageUrl($this->image, 'images/logodiscordillegal.png');
    }
}
