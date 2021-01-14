<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Url extends Model
{
    protected $fillable = ['original_url', 'shorten_url', 'user_id', 'title','platform_id',];
    protected $appends = ['path'];
    protected $guarded = [];

    public static function search($query)
    {
        return empty($query) ? static::query()
            : static::where('name', 'like', '%'.$query.'%')
                ->orWhere('email', 'like', '%'.$query.'%');
    }

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($url) {
            $url->shorten_url = Str::random(6);
        });
    }

    public function getRouteKeyName()
    {
        return 'shorten_url';
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function getPathAttribute()
    {
        return asset("$this->shorten_url");
    }

    public function platform()
    {
        return $this->belongsTo(Platform::class, 'platform_id', 'id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
