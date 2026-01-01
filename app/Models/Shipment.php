<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Shipment extends Model
{
    //
    protected $fillable = [
        'tracking_number',
        'sender_id',
        'receiver_id',
        'driver_id',
        'status',
        
    ];

    protected static function booted()
    {
        static::creating(function ($shipment) {
            // Generate a unique tracking number before creating a shipment
            $shipment->tracking_number = self::generateTrackingNumber();
        });
    }

    public static function generateTrackingNumber(): string
    {
       $prefix = 'VN'; // Mã quốc gia hoặc công ty
        $date = now()->format('ymd'); // Ví dụ: 251230
        
        do {
            // Tạo 6 ký tự in hoa ngẫu nhiên
            $random = strtoupper(Str::random(6));
            $trackingNumber = "{$prefix}{$date}{$random}";
            
            // Kiểm tra xem mã này đã tồn tại trong DB chưa
        } while (self::where('tracking_number', $trackingNumber)->exists());

        return $trackingNumber;
    }
}
