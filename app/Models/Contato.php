<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'email', 'telefone', 'cep', 'estado_id', 'cidade', 'bairro', 'endereco', 'numero'];

    public function estado()
    {
        return $this->belongsTo(Estado::class);
    }

}
