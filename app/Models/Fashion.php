<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fashion extends Model
{
    use HasFactory;
    protected $fillable = [
        // 'id',
        // 'id_user',
        'judul',
        'panduan',
        'deskripsi',
        'foto',
        'id_kategori',
        'id_user',
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
}