<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Barang extends Model
{
    use HasFactory;


    // protected $guarded  = ['id'];
    protected $primayKey = 'id';
    protected $table = 'tb_barang';
    protected $fillable = [
        'nama_barang',
        'no_barang',
        'harga_beli',
        'stock'
    ];

    public static function boot()
    {
        parent::boot();

        // Set up the event listener
        static::creating(function ($model) {
            if (!$model->no_barang) {
                $model->no_barang = static::generateUniqueNumber();
            }
        });
    }

    public static function generateUniqueNumber()
    {
        $prefix = 'PR-';
        $date = date('dmY'); // Get the current date in the format DDMMYYYY
        $lastNumber = static::max('no_barang'); // Get the maximum existing number from the database

        if ($lastNumber) {
            $lastNumber = substr($lastNumber, -4); // Extract the last 4 digits of the number
            $nextNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT); // Increment the number and pad it with leading zeros
        } else {
            $nextNumber = '0001'; // If no existing numbers, start with '0001'
        }

        return $prefix . $nextNumber;
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
