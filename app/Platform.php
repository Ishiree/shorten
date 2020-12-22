<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    public function Urls()
    {
        return $this -> hasMany(Url::class, 'platform_id', 'id');
    }
}
