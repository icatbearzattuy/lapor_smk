<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Laporan extends Model
{
    protected $table = 'tbl_laporan';
    protected $primaryKey = 'id_laporan';
    public $timestamps = false;

    protected $fillable = [
        'judul_laporan',
        'isi_laporan',
        'tanggal_laporan',
        'id_user',
        'id_kategori'
    ];

    public function Kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
