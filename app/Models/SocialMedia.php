<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedia extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public static function boot()
{
    parent::boot();

    static::saving(function ($model) {
        $host = parse_url($model->url, PHP_URL_HOST);
        $model->icon = "https://www.google.com/s2/favicons?sz=64&domain={$host}";
    });
}

}
