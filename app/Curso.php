<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    //
    public function rubros()
    {
        return $this->hasMany('App\Rubro', 'curso_id');
    }
}
