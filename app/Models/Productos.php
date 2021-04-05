<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $table ='productos';

    protected $primaryKey = 'Producto_Id';
    protected $fillable = ['Pro_Codigo','Pro_Nombre','Pro_PrecioVenta','Pro_Stock','Pro_Condicion','IdCategoria'];
    
}
