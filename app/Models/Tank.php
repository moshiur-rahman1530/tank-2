<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tank extends Model
{
    use HasFactory;


     protected $fillable = [
        'tank_number',
        'tank_owner',
        'manufacturing_date',
        'current_po_certificate',
        'certificate_name',
        'certificate_cost',
        'last_test_date',
        'expired_date',
        // 'no_of_test',
        // 'status'
    ];

    public function TankPosition()
    {
    	return $this->hasMany(TankPosition::class, 'tank_number', 'tank_number');
    }

   
}