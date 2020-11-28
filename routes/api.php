<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Merchant Categories
    Route::apiResource('merchant-categories', 'MerchantCategoryApiController');

    // Merchant Sub Categories
    Route::apiResource('merchant-sub-categories', 'MerchantSubCategoryApiController');

    // Merchant Managements
    Route::post('merchant-managements/media', 'MerchantManagementApiController@storeMedia')->name('merchant-managements.storeMedia');
    Route::apiResource('merchant-managements', 'MerchantManagementApiController');

    // Item Catrgories
    Route::apiResource('item-catrgories', 'ItemCatrgoryApiController');

    // Item Sub Cateogries
    Route::apiResource('item-sub-cateogries', 'ItemSubCateogryApiController');

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

    // Testasds
    Route::apiResource('testasds', 'TestasdApiController');

    // Seats
    Route::apiResource('seats', 'SeatsApiController');

    // Asdasds
    Route::apiResource('asdasds', 'AsdasdApiController');
});
