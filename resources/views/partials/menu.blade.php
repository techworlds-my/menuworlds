<div id="sidebar" class="c-sidebar c-sidebar-fixed c-sidebar-lg-show">

    <div class="c-sidebar-brand d-md-down-none">
        <a class="c-sidebar-brand-full h4" href="#">
            {{ trans('panel.site_title') }}
        </a>
    </div>

    <ul class="c-sidebar-nav">
        <li class="c-sidebar-nav-item">
            <a href="{{ route("admin.home") }}" class="c-sidebar-nav-link">
                <i class="c-sidebar-nav-icon fas fa-fw fa-tachometer-alt">

                </i>
                {{ trans('global.dashboard') }}
            </a>
        </li>
        @can('user_management_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/permissions*") ? "c-show" : "" }} {{ request()->is("admin/roles*") ? "c-show" : "" }} {{ request()->is("admin/users*") ? "c-show" : "" }} {{ request()->is("admin/audit-logs*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-users c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userManagement.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('permission_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.permissions.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/permissions") || request()->is("admin/permissions/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-unlock-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.permission.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('role_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.roles.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/roles") || request()->is("admin/roles/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-briefcase c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.role.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('user_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.users.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/users") || request()->is("admin/users/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-user c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.user.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('audit_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.audit-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/audit-logs") || request()->is("admin/audit-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-file-alt c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.auditLog.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('setting_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.setting.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('location_access')
                        <li class="c-sidebar-nav-dropdown {{ request()->is("admin/states*") ? "c-show" : "" }} {{ request()->is("admin/cities*") ? "c-show" : "" }} {{ request()->is("admin/areas*") ? "c-show" : "" }}">
                            <a class="c-sidebar-nav-dropdown-toggle" href="#">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.location.title') }}
                            </a>
                            <ul class="c-sidebar-nav-dropdown-items">
                                @can('state_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.states.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/states") || request()->is("admin/states/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.state.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('city_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.cities.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/cities") || request()->is("admin/cities/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.city.title') }}
                                        </a>
                                    </li>
                                @endcan
                                @can('area_access')
                                    <li class="c-sidebar-nav-item">
                                        <a href="{{ route("admin.areas.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/areas") || request()->is("admin/areas/*") ? "c-active" : "" }}">
                                            <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                            </i>
                                            {{ trans('cruds.area.title') }}
                                        </a>
                                    </li>
                                @endcan
                            </ul>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('merchant_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/merchant-categories*") ? "c-show" : "" }} {{ request()->is("admin/merchant-sub-categories*") ? "c-show" : "" }} {{ request()->is("admin/merchant-managements*") ? "c-show" : "" }} {{ request()->is("admin/merchant-levels*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.merchant.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('merchant_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.merchant-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/merchant-categories") || request()->is("admin/merchant-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.merchantCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('merchant_sub_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.merchant-sub-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/merchant-sub-categories") || request()->is("admin/merchant-sub-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.merchantSubCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('merchant_management_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.merchant-managements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/merchant-managements") || request()->is("admin/merchant-managements/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.merchantManagement.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('merchant_level_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.merchant-levels.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/merchant-levels") || request()->is("admin/merchant-levels/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.merchantLevel.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('user_alert_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.user-alerts.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/user-alerts") || request()->is("admin/user-alerts/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-bell c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.userAlert.title') }}
                </a>
            </li>
        @endcan
        @can('item_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/item-catrgories*") ? "c-show" : "" }} {{ request()->is("admin/item-sub-cateogries*") ? "c-show" : "" }} {{ request()->is("admin/item-managements*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.item.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('item_catrgory_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.item-catrgories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/item-catrgories") || request()->is("admin/item-catrgories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.itemCatrgory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('item_sub_cateogry_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.item-sub-cateogries.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/item-sub-cateogries") || request()->is("admin/item-sub-cateogries/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.itemSubCateogry.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('item_management_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.item-managements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/item-managements") || request()->is("admin/item-managements/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.itemManagement.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('order_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/order-managements*") ? "c-show" : "" }} {{ request()->is("admin/order-statuses*") ? "c-show" : "" }} {{ request()->is("admin/order-items*") ? "c-show" : "" }} {{ request()->is("admin/order-types*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.order.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('order_management_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.order-managements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/order-managements") || request()->is("admin/order-managements/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.orderManagement.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('order_status_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.order-statuses.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/order-statuses") || request()->is("admin/order-statuses/*") ? "c-active" : "" }}">
                                <i class="fa-fw far fa-flag c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.orderStatus.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('order_item_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.order-items.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/order-items") || request()->is("admin/order-items/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.orderItem.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('order_type_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.order-types.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/order-types") || request()->is("admin/order-types/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.orderType.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('voucher_managment_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/add-vouchers*") ? "c-show" : "" }} {{ request()->is("admin/voucher-reedems*") ? "c-show" : "" }} {{ request()->is("admin/voucher-wallets*") ? "c-show" : "" }} {{ request()->is("admin/voucher-categories*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.voucherManagment.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('add_voucher_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.add-vouchers.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/add-vouchers") || request()->is("admin/add-vouchers/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.addVoucher.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('voucher_reedem_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.voucher-reedems.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/voucher-reedems") || request()->is("admin/voucher-reedems/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.voucherReedem.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('voucher_wallet_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.voucher-wallets.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/voucher-wallets") || request()->is("admin/voucher-wallets/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.voucherWallet.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('voucher_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.voucher-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/voucher-categories") || request()->is("admin/voucher-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.voucherCategory.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('payment_method_access')
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.payment-methods.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/payment-methods") || request()->is("admin/payment-methods/*") ? "c-active" : "" }}">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.paymentMethod.title') }}
                </a>
            </li>
        @endcan
        @can('add_on_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/add-on-categories*") ? "c-show" : "" }} {{ request()->is("admin/add-on-managements*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.addOn.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('add_on_category_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.add-on-categories.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/add-on-categories") || request()->is("admin/add-on-categories/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.addOnCategory.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('add_on_management_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.add-on-managements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/add-on-managements") || request()->is("admin/add-on-managements/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.addOnManagement.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can('seat_access')
            <li class="c-sidebar-nav-dropdown {{ request()->is("admin/seats-logs*") ? "c-show" : "" }} {{ request()->is("admin/seats-managements*") ? "c-show" : "" }}">
                <a class="c-sidebar-nav-dropdown-toggle" href="#">
                    <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                    </i>
                    {{ trans('cruds.seat.title') }}
                </a>
                <ul class="c-sidebar-nav-dropdown-items">
                    @can('seats_log_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.seats-logs.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/seats-logs") || request()->is("admin/seats-logs/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.seatsLog.title') }}
                            </a>
                        </li>
                    @endcan
                    @can('seats_management_access')
                        <li class="c-sidebar-nav-item">
                            <a href="{{ route("admin.seats-managements.index") }}" class="c-sidebar-nav-link {{ request()->is("admin/seats-managements") || request()->is("admin/seats-managements/*") ? "c-active" : "" }}">
                                <i class="fa-fw fas fa-cogs c-sidebar-nav-icon">

                                </i>
                                {{ trans('cruds.seatsManagement.title') }}
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @php($unread = \App\Models\QaTopic::unreadCount())
            <li class="c-sidebar-nav-item">
                <a href="{{ route("admin.messenger.index") }}" class="{{ request()->is("admin/messenger") || request()->is("admin/messenger/*") ? "c-active" : "" }} c-sidebar-nav-link">
                    <i class="c-sidebar-nav-icon fa-fw fa fa-envelope">

                    </i>
                    <span>{{ trans('global.messages') }}</span>
                    @if($unread > 0)
                        <strong>( {{ $unread }} )</strong>
                    @endif

                </a>
            </li>
            @if(file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php')))
                @can('profile_password_edit')
                    <li class="c-sidebar-nav-item">
                        <a class="c-sidebar-nav-link {{ request()->is('profile/password') || request()->is('profile/password/*') ? 'c-active' : '' }}" href="{{ route('profile.password.edit') }}">
                            <i class="fa-fw fas fa-key c-sidebar-nav-icon">
                            </i>
                            {{ trans('global.change_password') }}
                        </a>
                    </li>
                @endcan
            @endif
            <li class="c-sidebar-nav-item">
                <a href="#" class="c-sidebar-nav-link" onclick="event.preventDefault(); document.getElementById('logoutform').submit();">
                    <i class="c-sidebar-nav-icon fas fa-fw fa-sign-out-alt">

                    </i>
                    {{ trans('global.logout') }}
                </a>
            </li>
    </ul>

</div>