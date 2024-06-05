<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;
    protected $table = 'autores';
    protected $dates = ['data_nascimento'];

    /**
     * Set the author's birth date.
     *
     * @param  string  $value
     * @return void
     */
    public function setDataNascimentoAttribute($value)
    {
        // Convert the date format before setting it
        $this->attributes['data_nascimento'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    }
    protected $fillable = [
        'nome',
        'biografia',
        'data_nascimento'
    ];
}
