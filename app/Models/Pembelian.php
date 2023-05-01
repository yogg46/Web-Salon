<?php

namespace App\Models;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    use AutoNumberTrait;

    protected $guarded  = ['id'];
    protected $primayKey = 'id';
    protected $table = 'pembelians';
    protected static function boot()
    {
        parent::boot();
        static::updating(function ($user) {
            //
        });
    }

    public function getAutoNumberOptions()
    {
        return [

            'manufaktur' => [
                'format' => function () {
                    return 'FS-' . date('dmY') . '-?'; // autonumber format. '?' will be replaced with the generated number.
                },
                'length' => 3 // The number of digits in the autonumber
            ]
        ];
    }
    protected $casts = [
        'tanggal' => 'datetime',
    ];
    public function pembelianRelasiSuplier()
    {
        return $this->belongsTo(Suplier::class, 'suplier_id');
    }

    public function pembelianRelasiUser()
    {
        return $this->belongsTo(User::class, 'petugas_gudang');
    }

    public function pembelianRelasiDetail()
    {
        return $this->hasMany(detailPembelian::class, 'pembelian_id');
    }
}
