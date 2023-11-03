<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use App\Models\Usuario;

class Chofer extends Usuario
{
    use HasFactory, softDeletes;

    public function vehiculo()
    {
        return $this->hasOne(Vehiculo::class);
    }

    protected $primaryKey = 'docDeIdentidad';

    protected $table = 'choferes';

    protected $fillable = [
        'docDeIdentidad'
    ];
}
