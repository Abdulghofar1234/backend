<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    # menambahkan property fillable
    protected $fillable = ['nama', 'berita', 'kejadian', 'lokasi'];
}