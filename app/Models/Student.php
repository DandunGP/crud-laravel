<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 'alamat', 'classroom_id', 'extra_id'
    ];

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }

    public function extracurricular()
    {
        return $this->belongsTo(Extracurricular::class, 'extra_id')->withDefault(['nama_extra' => 'Belum ada']);
    }

    public function scopeClassrooms($query)
    {
        return $query->where('classroom_id', '=', 2);
    }
}
