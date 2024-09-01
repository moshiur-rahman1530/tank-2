<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tank;
use App\Models\Lc;
use App\Models\Port;

class TankSeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
          $tanks =  [
            [
              'tank_number' => 'sam1333',
              'tank_owner' => 'Own',
              'manufacturing_date' => '2024-07-17',
              'current_po_certificate' => '22',
              'certificate_name' => 'samuda export',
              'certificate_cost' => '50000000',
              'last_test_date' => '2024-07-17',
              'expired_date' => '2024-07-17',
              'no_of_test' => '4',
              // 'status' => 'Laden',
            ],
            [
              'tank_number' => 'sam1222',
              'tank_owner' => 'Own',
              'manufacturing_date' => '2024-07-17',
              'current_po_certificate' => '22',
              'certificate_name' => 'samuda export',
              'certificate_cost' => '50000000',
              'last_test_date' => '2024-07-17',
              'last_test_date' => '2024-07-17',
              'expired_date' => '2024-07-17',
              'no_of_test' => '4',
              // 'status' => 'Laden',
            ],
            [
              'tank_number' => 'sam444',
              'tank_owner' => 'Rent',
              'manufacturing_date' => '2024-07-17',
              'current_po_certificate' => '22',
              'certificate_cost' => '50000000',
              'certificate_name' => 'samuda export',
              'last_test_date' => '2024-07-17',
              'last_test_date' => '2024-07-17',
              'expired_date' => '2024-07-17',
              'no_of_test' => '4',
              // 'status' => 'On Transit',
            ]
           
          ];
          

          foreach ($tanks as $tank) {
                    Tank::create($tank);
            }
          



          $lcs =  [
            [
              'lc_no' => '240',
              'lc_date' => '2024-07-17',
              'lc_type' => 'tt',
              'consignee_name' => 'Samuda',
              'beneficiary' => 'Samuda',
              'lc_expired_date' => '2024-07-17',
              'last_ship_date' => '2024-07-17',
              'product' => 'H202',
              'qtn' => '120',
              'price' => '200000',
              'origin' => 'dhaka',
              'destination' => 'singapore',
            ],
            [
              'lc_no' => '245',
              'lc_date' => '2024-07-17',
              'lc_type' => 'po',
              'consignee_name' => 'Samuda',
              'beneficiary' => 'Samuda',
              'lc_expired_date' => '2024-07-17',
              'last_ship_date' => '2024-07-17',
              'product' => 'cac03',
              'qtn' => '120',
              'price' => '200000',
              'origin' => 'dhaka',
              'destination' => 'malaysia',
            ],
            [
              'lc_no' => '260',
              'lc_date' => '2024-07-17',
              'lc_type' => 'sales',
              'consignee_name' => 'Samuda',
              'beneficiary' => 'Samuda',
              'lc_expired_date' => '2024-07-17',
              'last_ship_date' => '2024-07-17',
              'product' => 'Glue',
              'qtn' => '120',
              'price' => '200000',
              'origin' => 'dhaka',
              'destination' => 'hongkong',
            ],
           
          ];

          
          foreach ($lcs as $lc) {
                    Lc::create($lc);
            }




            $ports =  [
            [
              'port_no' => '01',
              'port_code' => 'Ctg_Port',
              'port_name' => 'Chittagong Port',
              'country' => 'Bangladesh',
              'city' => 'Chittagong',
              'geolocation' => 'Lat: 22 20 00 Long: 91 50 00',
            ],
            [
              'port_no' => '02',
              'port_code' => 'Sing_Port',
              'port_name' => 'Singapore Port',
              'country' => 'Singapore',
              'city' => 'Singapore',
              'geolocation' => 'Lat: 22 20 00 Long: 91 50 00',
            ],
            [
              'port_no' => '03',
              'port_code' => 'Mongla_Port',
              'port_name' => 'Khulna Port',
              'country' => 'Bangladesh',
              'city' => 'Khulna',
              'geolocation' => 'Lat: 22 20 00 Long: 91 50 00',
            ],
          ];

          
          foreach ($ports as $port) {
                    Port::create($port);
            }

    }
}