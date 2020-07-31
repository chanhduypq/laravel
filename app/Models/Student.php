<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public static function boot() {
        parent::boot();

        self::creating(function($model) {
            
        });

        self::created(function($model) {
            $classModel = Classes::find($model->class_id);
            $classModel->number_of_student++;
            $classModel->save();
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
