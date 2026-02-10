<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'عرض قائمة الموظفين',
            'إضافة موظف',
            'عرض قائمة المرضى',
            'إضافة مريض',
            'إدارة الفواتير',
            'إدارة المواعيد',
            'عرض التقارير',
            'إضافة عيادة',
            'إدارة الاقسام',
            'إدارة الخدمات',
            'إدارة الصلاحيات',
            'رسائل التواصل',
            'التحكم بالموقع',
        ];

        foreach ($permissions as  $permission) {
            Permission::firstOrCreate(['name' =>  $permission]);
        }
    }
}
