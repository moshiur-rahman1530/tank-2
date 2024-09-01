<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
  
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
           'user-list',
           'user-create',
           'user-edit',
           'user-delete',
           'role-list',
           'role-create',
           'role-edit',
           'role-delete',
           'port-list',
           'port-create',
           'port-edit',
           'port-delete',
           'certificate-list',
           'certificate-create',
           'certificate-edit',
           'certificate-delete',
           'lc-list',
           'lc-create',
           'lc-edit',
           'lc-delete',
           'position-list',
           'position-create',
           'position-edit',
           'position-delete',
           'tank-list',
           'tank-create',
           'tank-edit',
           'tank-delete'
        ];
        
        foreach ($permissions as $permission) {
             Permission::create(['name' => $permission]);
        }
    }
}