<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Layanan extends Model
{
    use HasFactory;
    use AutoNumberTrait;
    protected $guarded  = ['id'];
    protected $primayKey = 'id';
    protected $table = 'layanans';

    public function getAutoNumberOptions()
    {
        return [

            'manufaktur' => [
                'format' => function () {
                    return 'MS-' . date('dmY') . '-?'; // autonumber format. '?' will be replaced with the generated number.
                },
                'length' => 5 // The number of digits in the autonumber
            ]
        ];
    }
    public function layananRelasiUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function layananRelasiDetail()
    {
        return $this->hasMany(detailLayanan::class, 'layanan_id');
    }
}
