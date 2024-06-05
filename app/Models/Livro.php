<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Livro extends Model
{
    use HasFactory;

    protected $dates = ['publicado_em'];


    protected $fillable = [
        'titulo',
        'descricao',
        'autor_id',
        'editora_id',
        'publicado_em'
    ];

    public function setPublicadoEmAttribute($value)
    {
        $this->attributes['publicado_em'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }

    public function autor(): BelongsTo
    {
        return $this->belongsTo(Autor::class, 'autor_id');
    }

    public function editora(): BelongsTo
    {
        return $this->belongsTo(Editora::class, 'editora_id');
    }
}
