<?php

Route::redirect('/', '/login');
Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth', '2fa', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Merchant Categories
    Route::delete('merchant-categories/destroy', 'MerchantCategoryController@massDestroy')->name('merchant-categories.massDestroy');
    Route::post('merchant-categories/media', 'MerchantCategoryController@storeMedia')->name('merchant-categories.storeMedia');
    Route::post('merchant-categories/ckmedia', 'MerchantCategoryController@storeCKEditorImages')->name('merchant-categories.storeCKEditorImages');
    Route::resource('merchant-categories', 'MerchantCategoryController');

    // Merchant Sub Categories
    Route::delete('merchant-sub-categories/destroy', 'MerchantSubCategoryController@massDestroy')->name('merchant-sub-categories.massDestroy');
    Route::post('merchant-sub-categories/media', 'MerchantSubCategoryController@storeMedia')->name('merchant-sub-categories.storeMedia');
    Route::post('merchant-sub-categories/ckmedia', 'MerchantSubCategoryController@storeCKEditorImages')->name('merchant-sub-categories.storeCKEditorImages');
    Route::resource('merchant-sub-categories', 'MerchantSubCategoryController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Merchant Managements
    Route::delete('merchant-managements/destroy', 'MerchantManagementController@massDestroy')->name('merchant-managements.massDestroy');
    Route::post('merchant-managements/media', 'MerchantManagementController@storeMedia')->name('merchant-managements.storeMedia');
    Route::post('merchant-managements/ckmedia', 'MerchantManagementController@storeCKEditorImages')->name('merchant-managements.storeCKEditorImages');
    Route::resource('merchant-managements', 'MerchantManagementController');

    // Item Managements
    Route::delete('item-managements/destroy', 'ItemManagementController@massDestroy')->name('item-managements.massDestroy');
    Route::post('item-managements/media', 'ItemManagementController@storeMedia')->name('item-managements.storeMedia');
    Route::post('item-managements/ckmedia', 'ItemManagementController@storeCKEditorImages')->name('item-managements.storeCKEditorImages');
    Route::resource('item-managements', 'ItemManagementController');

    // Merchant Levels
    Route::delete('merchant-levels/destroy', 'MerchantLevelController@massDestroy')->name('merchant-levels.massDestroy');
    Route::resource('merchant-levels', 'MerchantLevelController');

    // States
    Route::delete('states/destroy', 'StatesController@massDestroy')->name('states.massDestroy');
    Route::resource('states', 'StatesController');

    // Cities
    Route::delete('cities/destroy', 'CityController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CityController');

    // Areas
    Route::delete('areas/destroy', 'AreaController@massDestroy')->name('areas.massDestroy');
    Route::resource('areas', 'AreaController');

    // Add Vouchers
    Route::delete('add-vouchers/destroy', 'AddVoucherController@massDestroy')->name('add-vouchers.massDestroy');
    Route::post('add-vouchers/media', 'AddVoucherController@storeMedia')->name('add-vouchers.storeMedia');
    Route::post('add-vouchers/ckmedia', 'AddVoucherController@storeCKEditorImages')->name('add-vouchers.storeCKEditorImages');
    Route::resource('add-vouchers', 'AddVoucherController');

    // Order Managements
    Route::delete('order-managements/destroy', 'OrderManagementsController@massDestroy')->name('order-managements.massDestroy');
    Route::resource('order-managements', 'OrderManagementsController');

    // Order Statuses
    Route::delete('order-statuses/destroy', 'OrderStatusController@massDestroy')->name('order-statuses.massDestroy');
    Route::resource('order-statuses', 'OrderStatusController');

    // Payment Methods
    Route::delete('payment-methods/destroy', 'PaymentMethodController@massDestroy')->name('payment-methods.massDestroy');
    Route::resource('payment-methods', 'PaymentMethodController');

    // Order Items
    Route::delete('order-items/destroy', 'OrderItemsController@massDestroy')->name('order-items.massDestroy');
    Route::resource('order-items', 'OrderItemsController');

    // Add On Categories
    Route::delete('add-on-categories/destroy', 'AddOnCategoriesController@massDestroy')->name('add-on-categories.massDestroy');
    Route::resource('add-on-categories', 'AddOnCategoriesController');

    // Add On Managements
    Route::delete('add-on-managements/destroy', 'AddOnManagementsController@massDestroy')->name('add-on-managements.massDestroy');
    Route::resource('add-on-managements', 'AddOnManagementsController');

    // Order Types
    Route::delete('order-types/destroy', 'OrderTypeController@massDestroy')->name('order-types.massDestroy');
    Route::resource('order-types', 'OrderTypeController');

    // Seats Logs
    Route::delete('seats-logs/destroy', 'SeatsLogController@massDestroy')->name('seats-logs.massDestroy');
    Route::resource('seats-logs', 'SeatsLogController');

    // Seats Managements
    Route::delete('seats-managements/destroy', 'SeatsManagementController@massDestroy')->name('seats-managements.massDestroy');
    Route::resource('seats-managements', 'SeatsManagementController');

    // Voucher Reedems
    Route::delete('voucher-reedems/destroy', 'VoucherReedemController@massDestroy')->name('voucher-reedems.massDestroy');
    Route::resource('voucher-reedems', 'VoucherReedemController');

    // Voucher Wallets
    Route::delete('voucher-wallets/destroy', 'VoucherWalletController@massDestroy')->name('voucher-wallets.massDestroy');
    Route::resource('voucher-wallets', 'VoucherWalletController');

    // Voucher Categories
    Route::delete('voucher-categories/destroy', 'VoucherCategoryController@massDestroy')->name('voucher-categories.massDestroy');
    Route::resource('voucher-categories', 'VoucherCategoryController');

    // Item Sub Categories
    Route::delete('item-sub-categories/destroy', 'ItemSubCategoryController@massDestroy')->name('item-sub-categories.massDestroy');
    Route::post('item-sub-categories/media', 'ItemSubCategoryController@storeMedia')->name('item-sub-categories.storeMedia');
    Route::post('item-sub-categories/ckmedia', 'ItemSubCategoryController@storeCKEditorImages')->name('item-sub-categories.storeCKEditorImages');
    Route::resource('item-sub-categories', 'ItemSubCategoryController');

    // Item Categories
    Route::delete('item-categories/destroy', 'ItemCategoryController@massDestroy')->name('item-categories.massDestroy');
    Route::post('item-categories/media', 'ItemCategoryController@storeMedia')->name('item-categories.storeMedia');
    Route::post('item-categories/ckmedia', 'ItemCategoryController@storeCKEditorImages')->name('item-categories.storeCKEditorImages');
    Route::resource('item-categories', 'ItemCategoryController');

    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
    Route::get('user-alerts/read', 'UserAlertsController@read');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
        Route::post('profile/two-factor', 'ChangePasswordController@toggleTwoFactor')->name('password.toggleTwoFactor');
    }
});
Route::group(['as' => 'frontend.', 'namespace' => 'Frontend', 'middleware' => ['auth', '2fa']], function () {
    Route::get('/home', 'HomeController@index')->name('home');

    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Merchant Categories
    Route::delete('merchant-categories/destroy', 'MerchantCategoryController@massDestroy')->name('merchant-categories.massDestroy');
    Route::resource('merchant-categories', 'MerchantCategoryController');

    // Merchant Sub Categories
    Route::delete('merchant-sub-categories/destroy', 'MerchantSubCategoryController@massDestroy')->name('merchant-sub-categories.massDestroy');
    Route::resource('merchant-sub-categories', 'MerchantSubCategoryController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // User Alerts
    Route::delete('user-alerts/destroy', 'UserAlertsController@massDestroy')->name('user-alerts.massDestroy');
    Route::resource('user-alerts', 'UserAlertsController', ['except' => ['edit', 'update']]);

    // Merchant Managements
    Route::delete('merchant-managements/destroy', 'MerchantManagementController@massDestroy')->name('merchant-managements.massDestroy');
    Route::resource('merchant-managements', 'MerchantManagementController');

    // Item Managements
    Route::delete('item-managements/destroy', 'ItemManagementController@massDestroy')->name('item-managements.massDestroy');
    Route::resource('item-managements', 'ItemManagementController');

    // Merchant Levels
    Route::delete('merchant-levels/destroy', 'MerchantLevelController@massDestroy')->name('merchant-levels.massDestroy');
    Route::resource('merchant-levels', 'MerchantLevelController');

    // States
    Route::delete('states/destroy', 'StatesController@massDestroy')->name('states.massDestroy');
    Route::resource('states', 'StatesController');

    // Cities
    Route::delete('cities/destroy', 'CityController@massDestroy')->name('cities.massDestroy');
    Route::resource('cities', 'CityController');

    // Areas
    Route::delete('areas/destroy', 'AreaController@massDestroy')->name('areas.massDestroy');
    Route::resource('areas', 'AreaController');

    // Add Vouchers
    Route::delete('add-vouchers/destroy', 'AddVoucherController@massDestroy')->name('add-vouchers.massDestroy');
    Route::resource('add-vouchers', 'AddVoucherController');

    // Order Managements
    Route::delete('order-managements/destroy', 'OrderManagementsController@massDestroy')->name('order-managements.massDestroy');
    Route::resource('order-managements', 'OrderManagementsController');

    // Order Statuses
    Route::delete('order-statuses/destroy', 'OrderStatusController@massDestroy')->name('order-statuses.massDestroy');
    Route::resource('order-statuses', 'OrderStatusController');

    // Payment Methods
    Route::delete('payment-methods/destroy', 'PaymentMethodController@massDestroy')->name('payment-methods.massDestroy');
    Route::resource('payment-methods', 'PaymentMethodController');

    // Order Items
    Route::delete('order-items/destroy', 'OrderItemsController@massDestroy')->name('order-items.massDestroy');
    Route::resource('order-items', 'OrderItemsController');

    // Add On Categories
    Route::delete('add-on-categories/destroy', 'AddOnCategoriesController@massDestroy')->name('add-on-categories.massDestroy');
    Route::resource('add-on-categories', 'AddOnCategoriesController');

    // Add On Managements
    Route::delete('add-on-managements/destroy', 'AddOnManagementsController@massDestroy')->name('add-on-managements.massDestroy');
    Route::resource('add-on-managements', 'AddOnManagementsController');

    // Order Types
    Route::delete('order-types/destroy', 'OrderTypeController@massDestroy')->name('order-types.massDestroy');
    Route::resource('order-types', 'OrderTypeController');

    // Seats Logs
    Route::delete('seats-logs/destroy', 'SeatsLogController@massDestroy')->name('seats-logs.massDestroy');
    Route::resource('seats-logs', 'SeatsLogController');

    // Seats Managements
    Route::delete('seats-managements/destroy', 'SeatsManagementController@massDestroy')->name('seats-managements.massDestroy');
    Route::resource('seats-managements', 'SeatsManagementController');

    // Voucher Reedems
    Route::delete('voucher-reedems/destroy', 'VoucherReedemController@massDestroy')->name('voucher-reedems.massDestroy');
    Route::resource('voucher-reedems', 'VoucherReedemController');

    // Voucher Wallets
    Route::delete('voucher-wallets/destroy', 'VoucherWalletController@massDestroy')->name('voucher-wallets.massDestroy');
    Route::resource('voucher-wallets', 'VoucherWalletController');

    // Voucher Categories
    Route::delete('voucher-categories/destroy', 'VoucherCategoryController@massDestroy')->name('voucher-categories.massDestroy');
    Route::resource('voucher-categories', 'VoucherCategoryController');

    // Item Sub Categories
    Route::delete('item-sub-categories/destroy', 'ItemSubCategoryController@massDestroy')->name('item-sub-categories.massDestroy');
    Route::resource('item-sub-categories', 'ItemSubCategoryController');

    // Item Categories
    Route::delete('item-categories/destroy', 'ItemCategoryController@massDestroy')->name('item-categories.massDestroy');
    Route::resource('item-categories', 'ItemCategoryController');

    Route::get('frontend/profile', 'ProfileController@index')->name('profile.index');
    Route::post('frontend/profile', 'ProfileController@update')->name('profile.update');
    Route::post('frontend/profile/destroy', 'ProfileController@destroy')->name('profile.destroy');
    Route::post('frontend/profile/password', 'ProfileController@password')->name('profile.password');
    Route::post('profile/toggle-two-factor', 'ProfileController@toggleTwoFactor')->name('profile.toggle-two-factor');
});
Route::group(['namespace' => 'Auth', 'middleware' => ['auth', '2fa']], function () {
// Two Factor Authentication
    if (file_exists(app_path('Http/Controllers/Auth/TwoFactorController.php'))) {
        Route::get('two-factor', 'TwoFactorController@show')->name('twoFactor.show');
        Route::post('two-factor', 'TwoFactorController@check')->name('twoFactor.check');
        Route::get('two-factor/resend', 'TwoFactorController@resend')->name('twoFactor.resend');
    }
});
