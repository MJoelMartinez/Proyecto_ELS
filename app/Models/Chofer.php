<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Usuario;

class Chofer extends Usuario
{
    use SoftDeletes;
    use HasFactory;

    protected $table = 'Choferes';

    protected $fillable = [
        'docDeIdentidad',
        'numeroChofer'
    ];
}
