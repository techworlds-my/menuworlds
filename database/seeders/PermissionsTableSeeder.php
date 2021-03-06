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
                'title' => 'item_management_create',
            ],
            [
                'id'    => 43,
                'title' => 'item_management_edit',
            ],
            [
                'id'    => 44,
                'title' => 'item_management_show',
            ],
            [
                'id'    => 45,
                'title' => 'item_management_delete',
            ],
            [
                'id'    => 46,
                'title' => 'item_management_access',
            ],
            [
                'id'    => 47,
                'title' => 'merchant_level_create',
            ],
            [
                'id'    => 48,
                'title' => 'merchant_level_edit',
            ],
            [
                'id'    => 49,
                'title' => 'merchant_level_show',
            ],
            [
                'id'    => 50,
                'title' => 'merchant_level_delete',
            ],
            [
                'id'    => 51,
                'title' => 'merchant_level_access',
            ],
            [
                'id'    => 52,
                'title' => 'location_access',
            ],
            [
                'id'    => 53,
                'title' => 'state_create',
            ],
            [
                'id'    => 54,
                'title' => 'state_edit',
            ],
            [
                'id'    => 55,
                'title' => 'state_show',
            ],
            [
                'id'    => 56,
                'title' => 'state_delete',
            ],
            [
                'id'    => 57,
                'title' => 'state_access',
            ],
            [
                'id'    => 58,
                'title' => 'city_create',
            ],
            [
                'id'    => 59,
                'title' => 'city_edit',
            ],
            [
                'id'    => 60,
                'title' => 'city_show',
            ],
            [
                'id'    => 61,
                'title' => 'city_delete',
            ],
            [
                'id'    => 62,
                'title' => 'city_access',
            ],
            [
                'id'    => 63,
                'title' => 'area_create',
            ],
            [
                'id'    => 64,
                'title' => 'area_edit',
            ],
            [
                'id'    => 65,
                'title' => 'area_show',
            ],
            [
                'id'    => 66,
                'title' => 'area_delete',
            ],
            [
                'id'    => 67,
                'title' => 'area_access',
            ],
            [
                'id'    => 68,
                'title' => 'voucher_managment_access',
            ],
            [
                'id'    => 69,
                'title' => 'add_voucher_create',
            ],
            [
                'id'    => 70,
                'title' => 'add_voucher_edit',
            ],
            [
                'id'    => 71,
                'title' => 'add_voucher_show',
            ],
            [
                'id'    => 72,
                'title' => 'add_voucher_delete',
            ],
            [
                'id'    => 73,
                'title' => 'add_voucher_access',
            ],
            [
                'id'    => 74,
                'title' => 'order_management_create',
            ],
            [
                'id'    => 75,
                'title' => 'order_management_edit',
            ],
            [
                'id'    => 76,
                'title' => 'order_management_show',
            ],
            [
                'id'    => 77,
                'title' => 'order_management_delete',
            ],
            [
                'id'    => 78,
                'title' => 'order_management_access',
            ],
            [
                'id'    => 79,
                'title' => 'order_status_create',
            ],
            [
                'id'    => 80,
                'title' => 'order_status_edit',
            ],
            [
                'id'    => 81,
                'title' => 'order_status_show',
            ],
            [
                'id'    => 82,
                'title' => 'order_status_delete',
            ],
            [
                'id'    => 83,
                'title' => 'order_status_access',
            ],
            [
                'id'    => 84,
                'title' => 'payment_method_create',
            ],
            [
                'id'    => 85,
                'title' => 'payment_method_edit',
            ],
            [
                'id'    => 86,
                'title' => 'payment_method_show',
            ],
            [
                'id'    => 87,
                'title' => 'payment_method_delete',
            ],
            [
                'id'    => 88,
                'title' => 'payment_method_access',
            ],
            [
                'id'    => 89,
                'title' => 'order_item_create',
            ],
            [
                'id'    => 90,
                'title' => 'order_item_edit',
            ],
            [
                'id'    => 91,
                'title' => 'order_item_show',
            ],
            [
                'id'    => 92,
                'title' => 'order_item_delete',
            ],
            [
                'id'    => 93,
                'title' => 'order_item_access',
            ],
            [
                'id'    => 94,
                'title' => 'add_on_access',
            ],
            [
                'id'    => 95,
                'title' => 'add_on_category_create',
            ],
            [
                'id'    => 96,
                'title' => 'add_on_category_edit',
            ],
            [
                'id'    => 97,
                'title' => 'add_on_category_show',
            ],
            [
                'id'    => 98,
                'title' => 'add_on_category_delete',
            ],
            [
                'id'    => 99,
                'title' => 'add_on_category_access',
            ],
            [
                'id'    => 100,
                'title' => 'add_on_management_create',
            ],
            [
                'id'    => 101,
                'title' => 'add_on_management_edit',
            ],
            [
                'id'    => 102,
                'title' => 'add_on_management_show',
            ],
            [
                'id'    => 103,
                'title' => 'add_on_management_delete',
            ],
            [
                'id'    => 104,
                'title' => 'add_on_management_access',
            ],
            [
                'id'    => 105,
                'title' => 'order_type_create',
            ],
            [
                'id'    => 106,
                'title' => 'order_type_edit',
            ],
            [
                'id'    => 107,
                'title' => 'order_type_show',
            ],
            [
                'id'    => 108,
                'title' => 'order_type_delete',
            ],
            [
                'id'    => 109,
                'title' => 'order_type_access',
            ],
            [
                'id'    => 110,
                'title' => 'seats_log_create',
            ],
            [
                'id'    => 111,
                'title' => 'seats_log_edit',
            ],
            [
                'id'    => 112,
                'title' => 'seats_log_show',
            ],
            [
                'id'    => 113,
                'title' => 'seats_log_delete',
            ],
            [
                'id'    => 114,
                'title' => 'seats_log_access',
            ],
            [
                'id'    => 115,
                'title' => 'seats_management_create',
            ],
            [
                'id'    => 116,
                'title' => 'seats_management_edit',
            ],
            [
                'id'    => 117,
                'title' => 'seats_management_show',
            ],
            [
                'id'    => 118,
                'title' => 'seats_management_delete',
            ],
            [
                'id'    => 119,
                'title' => 'seats_management_access',
            ],
            [
                'id'    => 120,
                'title' => 'seat_access',
            ],
            [
                'id'    => 121,
                'title' => 'voucher_reedem_create',
            ],
            [
                'id'    => 122,
                'title' => 'voucher_reedem_edit',
            ],
            [
                'id'    => 123,
                'title' => 'voucher_reedem_show',
            ],
            [
                'id'    => 124,
                'title' => 'voucher_reedem_delete',
            ],
            [
                'id'    => 125,
                'title' => 'voucher_reedem_access',
            ],
            [
                'id'    => 126,
                'title' => 'voucher_wallet_create',
            ],
            [
                'id'    => 127,
                'title' => 'voucher_wallet_edit',
            ],
            [
                'id'    => 128,
                'title' => 'voucher_wallet_show',
            ],
            [
                'id'    => 129,
                'title' => 'voucher_wallet_delete',
            ],
            [
                'id'    => 130,
                'title' => 'voucher_wallet_access',
            ],
            [
                'id'    => 131,
                'title' => 'voucher_category_create',
            ],
            [
                'id'    => 132,
                'title' => 'voucher_category_edit',
            ],
            [
                'id'    => 133,
                'title' => 'voucher_category_show',
            ],
            [
                'id'    => 134,
                'title' => 'voucher_category_delete',
            ],
            [
                'id'    => 135,
                'title' => 'voucher_category_access',
            ],
            [
                'id'    => 136,
                'title' => 'item_sub_category_create',
            ],
            [
                'id'    => 137,
                'title' => 'item_sub_category_edit',
            ],
            [
                'id'    => 138,
                'title' => 'item_sub_category_show',
            ],
            [
                'id'    => 139,
                'title' => 'item_sub_category_delete',
            ],
            [
                'id'    => 140,
                'title' => 'item_sub_category_access',
            ],
            [
                'id'    => 141,
                'title' => 'item_category_create',
            ],
            [
                'id'    => 142,
                'title' => 'item_category_edit',
            ],
            [
                'id'    => 143,
                'title' => 'item_category_show',
            ],
            [
                'id'    => 144,
                'title' => 'item_category_delete',
            ],
            [
                'id'    => 145,
                'title' => 'item_category_access',
            ],
            [
                'id'    => 146,
                'title' => 'profile_password_edit',
            ],
        ];

        Permission::insert($permissions);
    }
}
