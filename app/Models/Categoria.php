<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Schema;


class Categoria extends Model
{
    use HasFactory;

    
    protected $table = 'categoria';
    protected $primaryKey = 'IdCategoria';

    protected $fillable = ['Nombre','Descripcion','Condicion'];
}
