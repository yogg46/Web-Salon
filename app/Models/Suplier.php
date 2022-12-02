<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Suplier extends Model
{
    use HasFactory;
    use AutoNumberTrait;

    protected $guarded  = ['id'];
    protected $primayKey = 'id';
    protected $table = 'supliers';

    public function getAutoNumberOptions()
    {
        return [

            'no_suplier' => [
                'format' => function () {
                    return 'SP-?'; // autonumber format. '?' will be replaced with the generated number.
                },
                'length' => 3 // The number of digits in the autonumber
            ]
        ];
    }
    public function suplierRelasipembelian()
    {
        return $this->hasMany(Pembelian::class, 'suplier_id');
    }
}