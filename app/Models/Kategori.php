<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded  = ['id'];
    protected $primayKey = 'id';
    protected $table = 'kategoris';
    public function kategoriRelasiJasa()
    {
        return $this->hasMany(Jasa::class, 'kategori_id');
    }
}