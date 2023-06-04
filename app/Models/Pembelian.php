<?php

namespace App\Models;

use Alfa6661\AutoNumber\AutoNumberTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;


    protected $guarded  = ['id'];
    protected $primayKey = 'id';
    protected $table = 'tb_pembelian';



    public static function boot()
    {
        parent::boot();

        // Set up the event listener
        static::creating(function ($model) {
            if (!$model->manufaktur) {
                $model->manufaktur = static::generateUniqueNumber();
            }
        });
    }

    public static function generateUniqueNumber()
    {
        $prefix = 'FS-';
        $date = date('dmY'); // Get the current date in the format DDMMYYYY
        $lastNumber = static::max('manufaktur'); // Get the maximum existing number from the database

        if ($lastNumber) {
            $lastNumber = substr($lastNumber, -4); // Extract the last 4 digits of the number
            $nextNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT); // Increment the number and pad it with leading zeros
        } else {
            $nextNumber = '0001'; // If no existing numbers, start with '0001'
        }

        return $prefix . $date . '-' . $nextNumber;
    }
    protected $casts = [
        'tanggal' => 'datetime',
    ];
    protected $fillable = [
        'tanggal',
        'manufaktur',
        'total',
        'petugas_gudang',
        'suplier_id',
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
