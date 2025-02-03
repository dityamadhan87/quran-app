<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bookmark extends Model
{
    protected $table = 'koleksi';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'nama_koleksi',
        'koleksi_id'
    ];
}
