<?php

Route::view('/', 'welcome');
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
    Route::post('merchant-managements/media', 'MerchantManagementController@storeMedia')->name('merchant-managements.storeMedia');
    Route::post('merchant-managements/ckmedia', 'MerchantManagementController@storeCKEditorImages')->name('merchant-managements.storeCKEditorImages');
    Route::resource('merchant-managements', 'MerchantManagementController');

    // Item Catrgories
    Route::delete('item-catrgories/destroy', 'ItemCatrgoryController@massDestroy')->name('item-catrgories.massDestroy');
    Route::resource('item-catrgories', 'ItemCatrgoryController');

    // Item Sub Cateogries
    Route::delete('item-sub-cateogries/destroy', 'ItemSubCateogryController@massDestroy')->name('item-sub-cateogries.massDestroy');
    Route::resource('item-sub-cateogries', 'ItemSubCateogryController');

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

    // Item Catrgories
    Route::delete('item-catrgories/destroy', 'ItemCatrgoryController@massDestroy')->name('item-catrgories.massDestroy');
    Route::resource('item-catrgories', 'ItemCatrgoryController');

    // Item Sub Cateogries
    Route::delete('item-sub-cateogries/destroy', 'ItemSubCateogryController@massDestroy')->name('item-sub-cateogries.massDestroy');
    Route::resource('item-sub-cateogries', 'ItemSubCateogryController');

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
