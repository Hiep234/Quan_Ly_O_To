<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_number',
        'brand',
        'owner_id', // Đảm bảo cột này tồn tại trong bảng cars
    ];

    // Định nghĩa mối quan hệ với model Owner
    public function owner()
    {
        return $this->belongsTo(Owner::class, 'owner_id');
    }
}
