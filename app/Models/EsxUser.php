<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EsxUser extends Model
{
    protected $connection = 'esx';

    protected $table = 'users';

    protected $primaryKey = 'identifier';

    public $incrementing = false;

    protected $keyType = 'string';

    public $timestamps = false;

    protected $guarded = ['*'];

    protected $casts = [
        'accounts' => 'array',
        'is_dead' => 'boolean',
        'disabled' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::saving(function () {
            throw new \RuntimeException('La connexion ESX est en lecture seule.');
        });

        static::deleting(function () {
            throw new \RuntimeException('La connexion ESX est en lecture seule.');
        });
    }

    public function getFullNameAttribute(): string
    {
        $parts = array_filter([$this->firstname, $this->lastname]);

        return $parts !== [] ? implode(' ', $parts) : 'Citoyen inconnu';
    }

    public function wallet(): array
    {
        $accounts = $this->accounts ?? [];

        return [
            'money' => (int) ($accounts['money'] ?? 0),
            'bank' => (int) ($accounts['bank'] ?? 0),
            'black_money' => (int) ($accounts['black_money'] ?? 0),
        ];
    }
}
