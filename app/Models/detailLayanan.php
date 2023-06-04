<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailLayanan extends Model
{
    use HasFactory;
    protected $guarded  = ['id'];
    protected $primayKey = 'id';
    protected $table = 'tb_detail_layanan';

    public function detailRelasiJasa()
    {
        return $this->belongsTo(Jasa::class, 'jasa_id');
    }
    protected $fillable = [
        'jumlah',
        'harga',
        'subtotal',
        'layanan_id',
        'jasa_id'
    ];

    public function detailRelasiLayanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}
