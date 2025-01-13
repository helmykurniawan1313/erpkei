<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainImage extends Model
{
    use HasFactory;
    protected $table = "main_images";

    protected $fillable = ['file', 'keterangan'];
}
