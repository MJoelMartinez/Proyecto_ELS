<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Licencia extends Model
{
    use HasFactory, SoftDeletes;

    protected $primaryKey = 'idlicencia';

    protected $table = 'licencias';
    
    protected $fillable = [
        'idlicencia',
        'validodesde',
        'validohasta',
        'docdeidentidad',
        'categoria'
    ];
}
