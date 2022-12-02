<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jasa extends Model
{
    use HasFactory;
    protected $guarded  = ['id'];
    protected $primayKey = 'id';
    protected $table = 'jasas';

    public function jasaRelasiDetail()
    {
        return $this->hasMany(detailLayanan::class, 'jasa_id');
    }
    public function jasaRelasiKategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id');
    }
}
