<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projetos extends Model
{
    protected $fillable = ['nome','descricao','tempo','custo','img1','img2','id_usuario'];
}
