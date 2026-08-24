<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LegalJob extends Model
{
    protected $fillable = [
        'name',
        'description',
        'image',
        'discord_url',
        'sort_order',
    ];

    public function imageUrl(): string
    {
        return self::resolveImageUrl($this->image, 'images/logodiscordlegal.png');
    }

    public static function resolveImageUrl(?string $path, string $fallback): string
    {
        if ($path === null || trim($path) === '') {
            return asset($fallback);
        }

        $path = str_replace('\\', '/', trim($path));

        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return $path;
        }

        // Ancien chemin storage/public (jobs/xxx.png) → uploads/jobs/xxx.png
        if (preg_match('#^(jobs|organizations)/#', $path) === 1) {
            $path = 'uploads/'.$path;
        }

        if (str_starts_with($path, 'storage/')) {
            $path = 'uploads/'.substr($path, strlen('storage/'));
        }

        return asset($path);
    }
}
