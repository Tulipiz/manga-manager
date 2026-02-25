<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

class Projeto extends Model
{
    protected $fillable = ['titulo', 'capa', 'tipo', 'descricao'];

    public function categorias(): BelongsToMany
    {
        return $this->belongsToMany(Categoria::class);
    }

    public function getCapaUrlAttribute(): ?string
    {
        if (!$this->capa) return null;

        return rtrim(config('filesystems.disks.r2.url'), '/') . '/' . $this->capa;
    }
}
