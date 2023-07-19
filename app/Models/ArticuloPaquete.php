<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ArticuloPaquete extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = ['IdArticulo', 'IdPaquete'];

    protected $table = 'ArticuloPaquete';
}
