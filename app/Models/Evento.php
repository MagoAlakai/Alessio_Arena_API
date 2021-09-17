<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'hour',
        'name',
        'descripcion',
        'place',
        'link_place',
        'price',
        'link_external',
        'link_shop',
    ];
}
