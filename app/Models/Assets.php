<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assets extends Model
{
    use HasFactory;

    protected $connection = 'mysql';
    protected $table = 'assets';
    protected $primaryKey = 'id';

    protected $fillable = [
        'computer_name',
        'type',
        'serial_number',
        'manufacturer',
        'model',
        'os',
        'description',
    ];

    // public function attendance_event()
    // {
    //     return $this->hasMany(AttendanceFromQr::class, 'event_id', 'id');
    // }
}
