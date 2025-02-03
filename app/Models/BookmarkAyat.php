<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookmarkAyat extends Model
{
    protected $table = 'ayatbookmark';

    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'koleksi_id',
        'idAyat',
        'idSurat'
    ];
}
