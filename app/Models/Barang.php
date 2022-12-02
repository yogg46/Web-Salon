<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Barang extends Model
{
    use HasFactory;
    use AutoNumberTrait;

    protected $guarded  = ['id'];
    protected $primayKey = 'id';
    protected $table = 'barangs';
    public function getAutoNumberOptions()
    {
        return [

            'no_barang' => [
                'format' => function () {
                    return 'PR-?'; // autonumber format. '?' will be replaced with the generated number.
                },
                'length' => 3 // The number of digits in the autonumber
            ]
        ];
    }
    public function barangRelasiDetail()
    {
        return $this->hasMany(detailPembelian::class, 'barang_id');
    }
    public function barangRelasiPengambilan()
    {
        return $this->hasMany(Pengambilan::class, 'barang_id');
    }
}