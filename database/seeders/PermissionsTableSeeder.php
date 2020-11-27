<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            [
                'id'    => 1,
                'title' => 'user_management_access',
            ],
            [
                'id'    => 2,
                'title' => 'permission_create',
            ],
            [
                'id'    => 3,
                'title' => 'permission_edit',
            ],
            [
                'id'    => 4,
                'title' => 'permission_show',
            ],
            [
                'id'    => 5,
                'title' => 'permission_delete',
            ],
            [
                'id'    => 6,
                'title' => 'permission_access',
            ],
            [
                'id'    => 7,
                'title' => 'role_create',
            ],
            [
                'id'    => 8,
                'title' => 'role_edit',
            ],
            [
                'id'    => 9,
                'title' => 'role_show',
            ],
            [
                'id'    => 10,
                'title' => 'role_delete',
            ],
            [
                'id'    => 11,
                'title' => 'role_access',
            ],
            [
                'id'    => 12,
                'title' => 'user_create',
            ],
            [
                'id'    => 13,
                'title' => 'user_edit',
            ],
            [
                'id'    => 14,
                'title' => 'user_show',
            ],
            [
                'id'    => 15,
                'title' => 'user_delete',
            ],
            [
                'id'    => 16,
                'title' => 'user_access',
            ],
            [
                'id'    => 17,
                'title' => 'setting_access',
            ],
            [
                'id'    => 18,
                'title' => 'merchant_access',
            ],
            [
                'id'    => 19,
                'title' => 'merchant_category_create',
            ],
            [
                'id'    => 20,
                'title' => 'merchant_category_edit',
            ],
            [
                'id'    => 21,
                'title' => 'merchant_category_show',
            ],
            [
                'id'    => 22,
                'title' => 'merchant_category_delete',
            ],
            [
                'id'    => 23,
                'title' => 'merchant_category_access',
            ],
            [
                'id'    => 24,
                'title' => 'merchant_sub_category_create',
            ],
            [
                'id'    => 25,
                'title' => 'merchant_sub_category_edit',
            ],
            [
                'id'    => 26,
                'title' => 'merchant_sub_category_show',
            ],
            [
                'id'    => 27,
                'title' => 'merchant_sub_category_delete',
            ],
            [
                'id'    => 28,
                'title' => 'merchant_sub_category_access',
            ],
            [
                'id'    => 29,
                'title' => 'audit_log_show',
            ],
            [
                'id'    => 30,
                'title' => 'audit_log_access',
            ],
            [
                'id'    => 31,
                'title' => 'user_alert_create',
            ],
            [
                'id'    => 32,
                'title' => 'user_alert_show',
            ],
            [
                'id'    => 33,
                'title' => 'user_alert_delete',
            ],
            [
                'id'    => 34,
                'title' => 'user_alert_access',
            ],
            [
                'id'    => 35,
                'title' => 'merchant_management_create',
            ],
            [
                'id'    => 36,
                'title' => 'merchant_management_edit',
            ],
            [
                'id'    => 37,
                'title' => 'merchant_management_show',
            ],
            [
                'id'    => 38,
                'title' => 'merchant_management_delete',
            ],
            [
                'id'    => 39,
                'title' => 'merchant_management_access',
            ],
            [
                'id'    => 40,
                'title' => 'item_access',
            ],
            [
                'id'    => 41,
                'title' => 'order_access',
            ],
            [
                'id'    => 42,
                'title' => 'item_catrgory_create',
            ],
            [
                'id'    => 43,
                'title' => 'item_catrgory_edit',
            ],
            [
                'id'    => 44,
                'title' => 'item_catrgory_show',
            ],
            [
                'id'    => 45,
                'title' => 'item_catrgory_delete',
            ],
            [
                'id'    => 46,
                'title' => 'item_catrgory_access',
            ],
            [
                'id'    => 47,
                'title' => 'item_sub_cateogry_create',
            ],
            [
                'id'    => 48,
                'title' => 'item_sub_cateogry_edit',
            ],
            [
                'id'    => 49,
                'title' => 'item_sub_cateogry_show',
            ],
            [
                'id'    => 50,
                'title' => 'item_sub_cateogry_delete',
            ],
            [
                'id'    => 51,
                'title' => 'item_sub_cateogry_access',
            ],
            [
                'id'    => 52,
                'title' => 'item_management_create',
            ],
            [
                'id'    => 53,
                'title' => 'item_management_edit',
            ],
            [
                'id'    => 54,
                'title' => 'item_management_show',
            ],
            [
                'id'    => 55,
                'title' => 'item_management_delete',
            ],
            [
                'id'    => 56,
                'title' => 'item_management_access',
            ],
            [
                'id'    => 57,
                'title' => 'merchant_level_create',
            ],
            [
                'id'    => 58,
                'title' => 'merchant_level_edit',
            ],
            [
                'id'    => 59,
                'title' => 'merchant_level_show',
            ],
            [
                'id'    => 60,
                'title' => 'merchant_level_delete',
            ],
            [
                'id'    => 61,
                'title' => 'merchant_level_access',
            ],
            [
                'id'    => 62,
                'title' => 'location_access',
            ],
            [
                'id'    => 63,
                'title' => 'state_create',
            ],
            [
                'id'    => 64,
                'title' => 'state_edit',
            ],
            [
                'id'    => 65,
                'title' => 'state_show',
            ],
            [
                'id'    => 66,
                'title' => 'state_delete',
            ],
            [
                'id'    => 67,
                'title' => 'state_access',
            ],
            [
                'id'    => 68,
                'title' => 'city_create',
            ],
            [
                'id'    => 69,
                'title' => 'city_edit',
            ],
            [
                'id'    => 70,
                'title' => 'city_show',
            ],
            [
                'id'    => 71,
                'title' => 'city_delete',
            ],
            [
                'id'    => 72,
                'title' => 'city_access',
            ],
            [
                'id'    => 73,
                'title' => 'area_create',
            ],
            [
                'id'    => 74,
                'title' => 'area_edit',
            ],
            [
                'id'    => 75,
                'title' => 'area_show',
            ],
            [
                'id'    => 76,
                'title' => 'area_delete',
            ],
            [
                'id'    => 77,
                'title' => 'area_access',
            ],
            [
                'id'    => 78,
                'title' => 'voucher_managment_access',
            ],
            [
                'id'    => 79,
                'title' => 'add_voucher_create',
            ],
            [
                'id'    => 80,
                'title' => 'add_voucher_edit',
            ],
            [
                'id'    => 81,
                'title' => 'add_voucher_show',
            ],
            [
                'id'    => 82,
                'title' => 'add_voucher_delete',
            ],
            [
                'id'    => 83,
                'title' => 'add_voucher_access',
            ],
            [
                'id'    => 84,
                'title' => 'order_management_create',
            ],
            [
                'id'    => 85,
                'title' => 'order_management_edit',
            ],
            [
                'id'    => 86,
                'title' => 'order_management_show',
            ],
            [
                'id'    => 87,
                'title' => 'order_management_delete',
            ],
            [
                'id'    => 88,
                'title' => 'order_management_access',
            ],
            [
                'id'    => 89,
                'title' => 'order_status_create',
            ],
            [
                'id'    => 90,
                'title' => 'order_status_edit',
            ],
            [
                'id'    => 91,
                'title' => 'order_status_show',
            ],
            [
                'id'    => 92,
                'title' => 'order_status_delete',
            ],
            [
                'id'    => 93,
                'title' => 'order_status_access',
            ],
            [
                'id'    => 94,
                'title' => 'payment_method_create',
            ],
            [
                'id'    => 95,
                'title' => 'payment_method_edit',
            ],
            [
                'id'    => 96,
                'title' => 'payment_method_show',
            ],
            [
                'id'    => 97,
                'title' => 'payment_method_delete',
            ],
            [
                'id'    => 98,
                'title' => 'payment_method_access',
            ],
            [
                'id'    => 99,
                'title' => 'order_item_create',
            ],
            [
                'id'    => 100,
                'title' => 'order_item_edit',
            ],
            [
                'id'    => 101,
                'title' => 'order_item_show',
            ],
            [
                'id'    => 102,
                'title' => 'order_item_delete',
            ],
            [
                'id'    => 103,
                'title' => 'order_item_access',
            ],
            [
                'id'    => 104,
                'title' => 'add_on_access',
            ],
            [
                'id'    => 105,
                'title' => 'add_on_category_create',
            ],
            [
                'id'    => 106,
                'title' => 'add_on_category_edit',
            ],
            [
                'id'    => 107,
                'title' => 'add_on_category_show',
            ],
            [
                'id'    => 108,
                'title' => 'add_on_category_delete',
            ],
            [
                'id'    => 109,
                'title' => 'add_on_category_access',
            ],
            [
                'id'    => 110,
                'title' => 'add_on_management_create',
            ],
            [
                'id'    => 111,
                'title' => 'add_on_management_edit',
            ],
            [
                'id'    => 112,
                'title' => 'add_on_management_show',
            ],
            [
                'id'    => 113,
                'title' => 'add_on_management_delete',
            ],
            [
                'id'    => 114,
                'title' => 'add_on_management_access',
            ],
            [
                'id'    => 115,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
