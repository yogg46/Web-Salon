<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Layanan extends Model
{
    use HasFactory;
    // protected $guarded  = ['id'];
    protected $primayKey = 'id';
    protected $table = 'tb_layanan';

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
        $prefix = 'MNZ-';
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

    protected $fillable = [
        'tanggal',
        'manufaktur',
        'total',
        'user_id'
    ];
    protected $casts = [
        'tanggal' => 'datetime',
        // 'id' => 'interger'
    ];
    public function layananRelasiUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function layananRelasiDetail()
    {
        return $this->hasMany(detailLayanan::class, 'layanan_id');
    }
}
