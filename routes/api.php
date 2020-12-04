<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
<<<<<<< HEAD
=======

     //merchant-managements
     Route::get('merchant-managements/filter/merchant/{merchant_id}','MerchantManagementApiController@filter_by_id');

   
     Route::get('merchant-managements/filter/sub/{sub_category}',
     'MerchantManagementApiController@filter_by_sub_category');
     
      //merchant-sub-categories
      Route::get('merchant-sub-categories/filter/category/{category}',
     'MerchantManagementApiController@filter_by_category');
 
     //item-managements
     Route::get('item-managements/filter/merchant/{merchant_id}','ItemManagementApiController@filter_by_merchant_id');
 
     Route::get('item-managements/filter/category/{category}','ItemManagementApiController@filter_by_category');
     
     Route::get('item-managements/filter/sub/{category}','ItemManagementApiController@filter_by_sub_category');
 
     Route::get('item-managements/filter/merchant/{merchant}/category/{category}','ItemManagementApiController@filter_by_merchant_id_category');
 
      Route::get('item-managements/filter/merchant/{merchant}/sub/{category}','ItemManagementApiController@filter_by_merchant_id_sub_category');
     
     Route::get('item-managements/filter/item/{id}','ItemManagementApiController@filter_by_item_id');
 
     //order-managements
     Route::get('order-managements/filter/merchant/{merchant}','OrderManagementApiController@filter_by_merchant_id');
 
     Route::get('order-managements/filter/merchant/{merchant}/status/{status}','OrderManagementApiControll   er@filter_by_merchant_id_status');
 
     Route::get('order-managements/filter/username/{username}','OrderManagementApiController@filter_by_username');
 
     //item-category
      Route::get('item-categories/filter/merchant/{id}','ItemCategoryApiController@filter_by_merchant_id');
     
      
>>>>>>> 2c4a47a5c3e5d5ea4cf11bf66ce3c586c4dbcc8f
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Merchant Categories
    Route::post('merchant-categories/media', 'MerchantCategoryApiController@storeMedia')->name('merchant-categories.storeMedia');
    Route::apiResource('merchant-categories', 'MerchantCategoryApiController');

    // Merchant Sub Categories
    Route::post('merchant-sub-categories/media', 'MerchantSubCategoryApiController@storeMedia')->name('merchant-sub-categories.storeMedia');
    Route::apiResource('merchant-sub-categories', 'MerchantSubCategoryApiController');

    // Merchant Managements
    Route::post('merchant-managements/media', 'MerchantManagementApiController@storeMedia')->name('merchant-managements.storeMedia');
    Route::apiResource('merchant-managements', 'MerchantManagementApiController');

    // Item Managements
    Route::post('item-managements/media', 'ItemManagementApiController@storeMedia')->name('item-managements.storeMedia');
    Route::apiResource('item-managements', 'ItemManagementApiController');

    // Merchant Levels
    Route::apiResource('merchant-levels', 'MerchantLevelApiController');

    // States
    Route::apiResource('states', 'StatesApiController');

    // Cities
    Route::apiResource('cities', 'CityApiController');

    // Areas
    Route::apiResource('areas', 'AreaApiController');

    // Add Vouchers
    Route::post('add-vouchers/media', 'AddVoucherApiController@storeMedia')->name('add-vouchers.storeMedia');
    Route::apiResource('add-vouchers', 'AddVoucherApiController');

    // Order Managements
    Route::apiResource('order-managements', 'OrderManagementsApiController');

    // Order Statuses
    Route::apiResource('order-statuses', 'OrderStatusApiController');

    // Payment Methods
    Route::apiResource('payment-methods', 'PaymentMethodApiController');

    // Order Items
    Route::apiResource('order-items', 'OrderItemsApiController');

    // Add On Categories
    Route::apiResource('add-on-categories', 'AddOnCategoriesApiController');

    // Add On Managements
    Route::apiResource('add-on-managements', 'AddOnManagementsApiController');

    // Order Types
    Route::apiResource('order-types', 'OrderTypeApiController');

    // Seats Logs
    Route::apiResource('seats-logs', 'SeatsLogApiController');

    // Seats Managements
    Route::apiResource('seats-managements', 'SeatsManagementApiController');

    // Voucher Reedems
    Route::apiResource('voucher-reedems', 'VoucherReedemApiController');

    // Voucher Wallets
    Route::apiResource('voucher-wallets', 'VoucherWalletApiController');

    // Voucher Categories
    Route::apiResource('voucher-categories', 'VoucherCategoryApiController');

    // Item Sub Categories
    Route::post('item-sub-categories/media', 'ItemSubCategoryApiController@storeMedia')->name('item-sub-categories.storeMedia');
    Route::apiResource('item-sub-categories', 'ItemSubCategoryApiController');

    // Item Categories
    Route::post('item-categories/media', 'ItemCategoryApiController@storeMedia')->name('item-categories.storeMedia');
    Route::apiResource('item-categories', 'ItemCategoryApiController');
});
