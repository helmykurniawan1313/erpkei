<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    use HasFactory;
    protected $table = "cats";
    protected $guarded = ['id'];

    public function cats()
    {
        return $this->hasMany(Cat::class);
    }
}
