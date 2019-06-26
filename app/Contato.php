<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = ['nome', 'telefone', 'email', 'cep', 'logradouro', 'complemento', 'bairro', 'localidade', 'uf'];
}
