<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detailLayanan extends Model
{
    use HasFactory;
    protected $guarded  = ['id'];
    protected $primayKey = 'id';
    protected $table = 'detail_layanans';

    public function detailRelasiJasa()
    {
        return $this->belongsTo(Jasa::class, 'jasa_id');
    }

    public function detailRelasiLayanan()
    {
        return $this->belongsTo(Layanan::class, 'layanan_id');
    }
}