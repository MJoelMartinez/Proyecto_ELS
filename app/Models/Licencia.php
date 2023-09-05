<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Licencia extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'idLicencia';

    protected $table = 'licencias';
    
    protected $fillable = [
        'idLicencia',
        'validoDesde',
        'validoHasta',
        'docDeIdentidad',
        'categoria'
    ];
}
