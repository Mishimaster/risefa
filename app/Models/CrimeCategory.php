<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CrimeCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'sort_order',
    ];

    public function organizations(): HasMany
    {
        return $this->hasMany(CrimeOrganization::class)->orderBy('sort_order')->orderBy('name');
    }
}
