<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monhoc extends Model
{
    protected $fillable = ['name'];
    
    protected $primaryKey = 'uuid';

    public static function boot() {
        parent::boot();

        self::creating(function($model) {
            $model->uuid = \Illuminate\Support\Str::uuid();
        });

        self::created(function($model) {
            
        });

        self::updating(function($model) {
        });

        self::updated(function($model) {
        });

        self::deleting(function($model) {
        });

        self::deleted(function($model) {
        });
    }
}
