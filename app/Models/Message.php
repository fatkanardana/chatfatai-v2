<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    // Tambahkan ini biar kolom 'content' bisa diisi mass assignment
    protected $fillable = [
        'content',
        'sender',
        'receiver',
    ];
}

