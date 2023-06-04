<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengeluaranlain extends Model
{
    use HasFactory;
    protected $guarded  = ['id'];
    protected $primayKey = 'id';
    protected $table = 'tb_pengeluaranlain';
    public function kasir()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    protected $casts = [
        'tanggal' => 'datetime',
    ];
}
