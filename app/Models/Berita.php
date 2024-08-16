<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Berita extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'beritas';
    protected $guarded = [
        'id'
    ];

    public function kategori()
    {
        return $this->belongsTo(KategoriBerita::class ,'kategori_id','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class ,'created_by','id');
    }
}
