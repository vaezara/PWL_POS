<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangModel extends Model
{
    use HasFactory;

    protected $table = 'm_barang'; // Sesuaikan dengan nama tabel di database

    protected $primaryKey = 'barang_id'; // Primary key

    public $timestamps = false; // Nonaktifkan timestamps jika tidak digunakan

    protected $fillable = [
        'kategori_id',   // Foreign key ke tabel kategori
        'barang_kode',   
        'barang_nama',   
        'harga_beli',    
        'harga_jual'     
    ];

    // Relasi ke tabel kategori
    public function kategori()
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
    }
}
