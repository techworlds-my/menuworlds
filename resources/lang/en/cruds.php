<?php

return [
    'userManagement'      => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'          => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'role'                => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'title'              => 'Title',
            'title_helper'       => ' ',
            'permissions'        => 'Permissions',
            'permissions_helper' => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'user'                => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'name'                         => 'Name',
            'name_helper'                  => ' ',
            'email'                        => 'Email',
            'email_helper'                 => ' ',
            'email_verified_at'            => 'Email verified at',
            'email_verified_at_helper'     => ' ',
            'password'                     => 'Password',
            'password_helper'              => ' ',
            'roles'                        => 'Roles',
            'roles_helper'                 => ' ',
            'remember_token'               => 'Remember Token',
            'remember_token_helper'        => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
            'two_factor'                   => 'Two-Factor Auth',
            'two_factor_helper'            => ' ',
            'two_factor_code'              => 'Two-factor code',
            'two_factor_code_helper'       => ' ',
            'two_factor_expires_at'        => 'Two-factor expires at',
            'two_factor_expires_at_helper' => ' ',
            'username'                     => 'Username',
            'username_helper'              => ' ',
            'is_merchant'                  => 'Is Merchant',
            'is_merchant_helper'           => ' ',
            'point'                        => 'Point',
            'point_helper'                 => ' ',
        ],
    ],
    'setting'             => [
        'title'          => 'Setting',
        'title_singular' => 'Setting',
    ],
    'merchant'            => [
        'title'          => 'Merchant',
        'title_singular' => 'Merchant',
    ],
    'merchantCategory'    => [
        'title'          => 'Merchant Category',
        'title_singular' => 'Merchant Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'name'              => 'Name',
            'name_helper'       => ' ',
            'is_enable'         => 'Is Enable',
            'is_enable_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'merchantSubCategory' => [
        'title'          => 'Merchant Sub Category',
        'title_singular' => 'Merchant Sub Category',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'sub_category'        => 'Sub Category',
            'sub_category_helper' => ' ',
            'in_enable'           => 'In Enable',
            'in_enable_helper'    => ' ',
            'category'            => 'Category',
            'category_helper'     => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
        ],
    ],
    'auditLog'            => [
        'title'          => 'Audit Logs',
        'title_singular' => 'Audit Log',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'description'         => 'Description',
            'description_helper'  => ' ',
            'subject_id'          => 'Subject ID',
            'subject_id_helper'   => ' ',
            'subject_type'        => 'Subject Type',
            'subject_type_helper' => ' ',
            'user_id'             => 'User ID',
            'user_id_helper'      => ' ',
            'properties'          => 'Properties',
            'properties_helper'   => ' ',
            'host'                => 'Host',
            'host_helper'         => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
        ],
    ],
    'userAlert'           => [
        'title'          => 'User Alerts',
        'title_singular' => 'User Alert',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'alert_text'        => 'Alert Text',
            'alert_text_helper' => ' ',
            'alert_link'        => 'Alert Link',
            'alert_link_helper' => ' ',
            'user'              => 'Users',
            'user_helper'       => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
        ],
    ],
    'merchantManagement'  => [
        'title'          => 'Merchant Management',
        'title_singular' => 'Merchant Management',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => ' ',
            'company_name'            => 'Company Name',
            'company_name_helper'     => ' ',
            'ssm'                     => 'Ssm',
            'ssm_helper'              => ' ',
            'address'                 => 'Address',
            'address_helper'          => ' ',
            'postcode'                => 'Postcode',
            'postcode_helper'         => ' ',
            'in_charge_person'        => 'In Charge Person',
            'in_charge_person_helper' => ' ',
            'contact'                 => 'Contact',
            'contact_helper'          => ' ',
            'email'                   => 'Email',
            'email_helper'            => ' ',
            'position'                => 'Position',
            'position_helper'         => ' ',
            'website'                 => 'Website',
            'website_helper'          => ' ',
            'facebook'                => 'Facebook',
            'facebook_helper'         => ' ',
            'instagram'               => 'Instagram',
            'instagram_helper'        => ' ',
            'merchant'                => 'Merchant',
            'merchant_helper'         => ' ',
            'sub_category'            => 'Sub Category',
            'sub_category_helper'     => ' ',
            'created_at'              => 'Created at',
            'created_at_helper'       => ' ',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => ' ',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => ' ',
            'approved_by'             => 'Approved By',
            'approved_by_helper'      => ' ',
            'status'                  => 'Status',
            'status_helper'           => ' ',
            'profile_photo'           => 'Profile Photo',
            'profile_photo_helper'    => ' ',
            'description'             => 'Description',
            'description_helper'      => ' ',
            'merchane_level'          => 'Merchane Level',
            'merchane_level_helper'   => ' ',
            'area'                    => 'Area',
            'area_helper'             => ' ',
        ],
    ],
    'item'                => [
        'title'          => 'Item',
        'title_singular' => 'Item',
    ],
    'order'               => [
        'title'          => 'Order',
        'title_singular' => 'Order',
    ],
    'itemCatrgory'        => [
        'title'          => 'Item Catrgory',
        'title_singular' => 'Item Catrgory',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
            'is_enable'         => 'Is Enable',
            'is_enable_helper'  => ' ',
        ],
    ],
    'itemSubCateogry'     => [
        'title'          => 'Item Sub Cateogry',
        'title_singular' => 'Item Sub Cateogry',
        'fields'         => [
            'id'                   => 'ID',
            'id_helper'            => ' ',
            'title'                => 'Title',
            'title_helper'         => ' ',
            'item_category'        => 'Item Category',
            'item_category_helper' => ' ',
            'is_enable'            => 'Is Enable',
            'is_enable_helper'     => ' ',
            'created_at'           => 'Created at',
            'created_at_helper'    => ' ',
            'updated_at'           => 'Updated at',
            'updated_at_helper'    => ' ',
            'deleted_at'           => 'Deleted at',
            'deleted_at_helper'    => ' ',
        ],
    ],
    'itemManagement'      => [
        'title'          => 'Item Management',
        'title_singular' => 'Item Management',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => ' ',
            'title'                 => 'Title',
            'title_helper'          => ' ',
            'price'                 => 'Price',
            'price_helper'          => ' ',
            'image'                 => 'Image',
            'image_helper'          => ' ',
            'sales_price'           => 'Sales Price',
            'sales_price_helper'    => ' ',
            'is_recommended'        => 'Is Recommended',
            'is_recommended_helper' => ' ',
            'is_popular'            => 'Is Popular',
            'is_popular_helper'     => ' ',
            'is_new'                => 'Is New',
            'is_new_helper'         => ' ',
            'rate'                  => 'Rate',
            'rate_helper'           => ' ',
            'is_active'             => 'Is Active',
            'is_active_helper'      => ' ',
            'is_veg'                => 'Is Veg',
            'is_veg_helper'         => ' ',
            'is_halal'              => 'Is Halal',
            'is_halal_helper'       => ' ',
            'created_at'            => 'Created at',
            'created_at_helper'     => ' ',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => ' ',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => ' ',
            'sub_cateogry'          => 'Sub Cateogry',
            'sub_cateogry_helper'   => ' ',
            'categpry'              => 'Categpry',
            'categpry_helper'       => ' ',
        ],
    ],
    'merchantLevel'       => [
        'title'          => 'Merchant Level',
        'title_singular' => 'Merchant Level',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'level'              => 'Level',
            'level_helper'       => ' ',
            'in_enable'          => 'In Enable',
            'in_enable_helper'   => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'module'             => 'Module',
            'module_helper'      => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'location'            => [
        'title'          => 'Location',
        'title_singular' => 'Location',
    ],
    'state'               => [
        'title'          => 'States',
        'title_singular' => 'State',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'states'            => 'States',
            'states_helper'     => ' ',
            'is_enable'         => 'Is Enable',
            'is_enable_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'city'                => [
        'title'          => 'City',
        'title_singular' => 'City',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'city'              => 'City',
            'city_helper'       => ' ',
            'states'            => 'States',
            'states_helper'     => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'area'                => [
        'title'          => 'Area',
        'title_singular' => 'Area',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'area'              => 'Area',
            'area_helper'       => ' ',
            'city'              => 'City',
            'city_helper'       => ' ',
            'postcode'          => 'Postcode',
            'postcode_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'voucherManagment'    => [
        'title'          => 'Voucher Managment',
        'title_singular' => 'Voucher Managment',
    ],
    'addVoucher'          => [
        'title'          => 'Add Voucher',
        'title_singular' => 'Add Voucher',
        'fields'         => [
            'id'                           => 'ID',
            'id_helper'                    => ' ',
            'voucher_code'                 => 'Voucher Code',
            'voucher_code_helper'          => ' ',
            'discount_type'                => 'Discount Type',
            'discount_type_helper'         => ' ',
            'value'                        => 'Value',
            'value_helper'                 => ' ',
            'description'                  => 'Description',
            'description_helper'           => ' ',
            'redeem_point'                 => 'Redeem Point',
            'redeem_point_helper'          => ' ',
            'created_at'                   => 'Created at',
            'created_at_helper'            => ' ',
            'updated_at'                   => 'Updated at',
            'updated_at_helper'            => ' ',
            'deleted_at'                   => 'Deleted at',
            'deleted_at_helper'            => ' ',
            'is_free_shipping'             => 'Is Free Shipping',
            'is_free_shipping_helper'      => ' ',
            'is_credit_purchase'           => 'Is Credit Purchase',
            'is_credit_purchase_helper'    => ' ',
            'expired_time'                 => 'Expired Time',
            'expired_time_helper'          => ' ',
            'select_item'                  => 'Select Item',
            'select_item_helper'           => ' ',
            'min_spend'                    => 'Min Spend',
            'min_spend_helper'             => ' ',
            'max_spend'                    => 'Max Spend',
            'max_spend_helper'             => ' ',
            'excluded_sales_item'          => 'Excluded Sales Item',
            'excluded_sales_item_helper'   => ' ',
            'selected_category'            => 'Selected Category',
            'selected_category_helper'     => ' ',
            'selected_sub_category'        => 'Selected Sub Category',
            'selected_sub_category_helper' => ' ',
            'usage_limit'                  => 'Usage Limit',
            'usage_limit_helper'           => ' ',
            'limit_per_user'               => 'Limit Per User',
            'limit_per_user_helper'        => ' ',
        ],
    ],
    'orderManagement'     => [
        'title'          => 'Order Managements',
        'title_singular' => 'Order Management',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => ' ',
            'order'                  => 'Order',
            'order_helper'           => ' ',
            'username'               => 'Username',
            'username_helper'        => ' ',
            'address'                => 'Address',
            'address_helper'         => ' ',
            'price'                  => 'Price',
            'price_helper'           => ' ',
            'delivery_charge'        => 'Delivery Charge',
            'delivery_charge_helper' => ' ',
            'tax'                    => 'Tax',
            'tax_helper'             => ' ',
            'total'                  => 'Total',
            'total_helper'           => ' ',
            'comment'                => 'Comment',
            'comment_helper'         => ' ',
            'merchant'               => 'Merchant',
            'merchant_helper'        => ' ',
            'created_at'             => 'Created at',
            'created_at_helper'      => ' ',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => ' ',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => ' ',
            'payment_method'         => 'Payment Method',
            'payment_method_helper'  => ' ',
            'status'                 => 'Status',
            'status_helper'          => ' ',
            'voucher_used'           => 'Voucher Used',
            'voucher_used_helper'    => ' ',
            'voucher'                => 'Voucher',
            'voucher_helper'         => ' ',
            'order_type'             => 'Order Type',
            'order_type_helper'      => ' ',
        ],
    ],
    'orderStatus'         => [
        'title'          => 'Order Status',
        'title_singular' => 'Order Status',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'status'            => 'Status',
            'status_helper'     => ' ',
            'in_enable'         => 'In Enable',
            'in_enable_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'paymentMethod'       => [
        'title'          => 'Payment Method',
        'title_singular' => 'Payment Method',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => ' ',
            'method'             => 'Method',
            'method_helper'      => ' ',
            'status'             => 'Status',
            'status_helper'      => ' ',
            'description'        => 'Description',
            'description_helper' => ' ',
            'in_enable'          => 'In Enable',
            'in_enable_helper'   => ' ',
            'created_at'         => 'Created at',
            'created_at_helper'  => ' ',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => ' ',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => ' ',
        ],
    ],
    'orderItem'           => [
        'title'          => 'Order Items',
        'title_singular' => 'Order Item',
        'fields'         => [
            'id'                  => 'ID',
            'id_helper'           => ' ',
            'item'                => 'Item',
            'item_helper'         => ' ',
            'quantity'            => 'Quantity',
            'quantity_helper'     => ' ',
            'order'               => 'Order',
            'order_helper'        => ' ',
            'created_at'          => 'Created at',
            'created_at_helper'   => ' ',
            'updated_at'          => 'Updated at',
            'updated_at_helper'   => ' ',
            'deleted_at'          => 'Deleted at',
            'deleted_at_helper'   => ' ',
            'price'               => 'Price',
            'price_helper'        => ' ',
            'add_on'              => 'Add On',
            'add_on_helper'       => ' ',
            'add_on_price'        => 'Add On Price',
            'add_on_price_helper' => ' ',
        ],
    ],
    'addOn'               => [
        'title'          => 'Add On',
        'title_singular' => 'Add On',
    ],
    'addOnCategory'       => [
        'title'          => 'Add On Categories',
        'title_singular' => 'Add On Category',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'is_enable'         => 'Is Enable',
            'is_enable_helper'  => ' ',
            'created_by'        => 'Created By',
            'created_by_helper' => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'addOnManagement'     => [
        'title'          => 'Add On Managements',
        'title_singular' => 'Add On Management',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'title'             => 'Title',
            'title_helper'      => ' ',
            'price'             => 'Price',
            'price_helper'      => ' ',
            'is_enable'         => 'Is Enable',
            'is_enable_helper'  => ' ',
            'item'              => 'Item',
            'item_helper'       => ' ',
            'category'          => 'Category',
            'category_helper'   => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'test'                => [
        'title'          => 'Test',
        'title_singular' => 'Test',
    ],
    'orderType'           => [
        'title'          => 'Order Type',
        'title_singular' => 'Order Type',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'type'              => 'Type',
            'type_helper'       => ' ',
            'in_enable'         => 'In Enable',
            'in_enable_helper'  => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
    'testasd'             => [
        'title'          => 'Testsad',
        'title_singular' => 'Testsad',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => ' ',
            'asd'               => 'Asd',
            'asd_helper'        => ' ',
            'created_at'        => 'Created at',
            'created_at_helper' => ' ',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => ' ',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => ' ',
        ],
    ],
];
