<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TankPosition extends Model
{
    use HasFactory;



protected $nullable = [
        'etd_to_final_dest',
        'eta_to_final_dest',
        'loading_date',
        'connecting_port_name',
        'arrived_at_connecting_port',
        'sail_to_dest_port',
        'arrived_at_dest_port',
        'arrival_at_customer',
        'arrive_to_agent_warehouse',
        'loading_port',
        'sail_to_conneting',
        'arrive_at_conneting',
        'sail_to_dest',
        'arrived_at_dest',
        'arrived_at_warehouse',
        'tank_status'
];



    protected $fillable = [
        'shipment_id',
        'tank_number',
        'lc_no',
        'consignee_name',
        'origin',
        'destination'
        
    ];

    public function lc()
    {
    	return $this->hasMany(Lc::class, 'id', 'lc_no');
    }


   public function tank()
    {
    	return $this->belonsTo(Tank::class, 'tank_number');
    }


     public static function tank_status_tank_number($id)
    {
      $result = TankPosition::where('tank_number', $id)->first();

    //   foreach ($result as $res) {
    //     return $res;
    //   }

        return $result;
    //   $status = $result->tank_status;

    //   dd($status);

  
    //   return $status;

    //    return Lc::where($id, ['id']);
        //   return $result;
    }

}