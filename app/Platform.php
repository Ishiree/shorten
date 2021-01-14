<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    protected $fillable = ['nama', 'url_platform'];
    protected $appends = ['path'];

    public function Urls()
    {
        return $this -> hasMany(Url::class, 'platform_id', 'id');
    }
}
