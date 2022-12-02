<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;
    protected $guarded  = ['id'];
    protected $primayKey = 'id';
    protected $table = 'layanans';

    public function layananRelasiUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function layananRelasiDetail()
    {
        return $this->hasMany(detailLayanan::class, 'layanan_id');
    }
}