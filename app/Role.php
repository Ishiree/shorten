<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function modelHasRoles()
    {
        return $this->morphMany('App\ModelHasRole', 'modelRole');
    }
}
