<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Attendant extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'uuid',
        'mobile',
        'team',
        'runs',
        'time',
        'tc_accepted'
    ];



    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Str::uuid();
        });
    }
}
