<?php

namespace App\Models;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengambilan extends Model
{
    use HasFactory;
    use AutoNumberTrait;

    protected $guarded  = ['id'];
    protected $primayKey = 'id';
    protected $table = 'pengambilans';
    public function getAutoNumberOptions()
    {
        return [

            'no_pengambilan' => [
                'format' => function () {
                    return 'AM-' . date('dmY') . '-?'; // autonumber format. '?' will be replaced with the generated number.
                },
                'length' => 3 // The number of digits in the autonumber
            ]
        ];
    }


    public function pengambilanRelasiUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function pengambilanRelasiBarang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
}
