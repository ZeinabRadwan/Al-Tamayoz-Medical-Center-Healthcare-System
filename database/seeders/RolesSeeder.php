<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // DB::table('roles')->insert([
        //     ['role_name' => 'ادمن'],
            // ['role_name' => 'موظف'],
        //     ['role_name' => 'مفصول'],

        // ]);

        $admin = Role::firstOrCreate(['name' => 'ادمن']);
        $admin->givePermissionTo(Permission::all());

        // $doctor = Role::firstOrCreate(['name' => 'موظف']);
        // $doctor->givePermissionTo([
        //     'عرض قائمة المرضى',
        //     'إضافة مريض',
        //     'عرض التقارير',
        //     'رسائل التواصل',
        // ]);

        Role::create(['name' => 'مفصول']);
    }
}
