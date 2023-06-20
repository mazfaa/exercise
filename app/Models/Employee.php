<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'position_id', 'office_id', 'photo'];

    public function position() {
        return $this->belongsTo(Position::class);
    }

    public function office()
    {
        return $this->belongsTo(Office::class);
    }
}