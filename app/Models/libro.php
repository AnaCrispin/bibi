<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class libro extends Model
{
    use HasFactory;
    protected $table = "libro";
    protected $fillable = [
        'id_libro',
        'titulo',
        'portada',
        'archivo_pdf'
    ];

}
