<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lc extends Model
{
    use HasFactory;


    protected $fillable = [
        'lc_no',
        'lc_date',
        'lc_type',
        'consignee_name',
        'beneficiary',
        'lc_expired_date',
        'last_ship_date',
        'product',
        'qtn',
        'price',
        'origin',
        'destination'
    ];


    public function TankPosition()
    {
    	return $this->belongsTo(TankPosition::class);
    }


     public static function lc_by_id($id)
    {
      $result = Lc::where('id',$id)->get('lc_no');

      return $result[0];

    //    return Lc::where($id, ['id']);
        //   return $result;
    }


    
    
}