<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailPembelian extends Model
{
    use HasFactory;
    // protected $guarded  = ['id'];
    protected $primayKey = 'id';
    protected $table = 'tb_detail_pembelian';

    protected $fillable = [
        'jumlah',
        'harga',
        'subtotal',
        'pembelian_id',
        'barang_id'
    ];

    public function detailRelasiBarang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    public function detailRelasiPembelian()
    {
        return $this->belongsTo(Pembelian::class, 'pembelian_id');
    }
}
