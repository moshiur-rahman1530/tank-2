<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

     protected $fillable = [
        'certificate_id', 'container_id', 'certificate_name', 'test_date', 'expiration_date', 'certificate_cost'
    ];
}