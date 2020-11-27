<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/css/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    @yield('styles')
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @guest
                        @else
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('frontend.home') }}">
                                    {{ __('Dashboard') }}
                                </a>
                            </li>
                        @endguest
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if(Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">

                                    <a class="dropdown-item" href="{{ route('frontend.profile.index') }}">{{ __('My profile') }}</a>

                                    @can('user_management_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.userManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('permission_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.permissions.index') }}">
                                            {{ trans('cruds.permission.title') }}
                                        </a>
                                    @endcan
                                    @can('role_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.roles.index') }}">
                                            {{ trans('cruds.role.title') }}
                                        </a>
                                    @endcan
                                    @can('user_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.users.index') }}">
                                            {{ trans('cruds.user.title') }}
                                        </a>
                                    @endcan
                                    @can('setting_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.setting.title') }}
                                        </a>
                                    @endcan
                                    @can('location_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.location.title') }}
                                        </a>
                                    @endcan
                                    @can('state_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.states.index') }}">
                                            {{ trans('cruds.state.title') }}
                                        </a>
                                    @endcan
                                    @can('city_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.cities.index') }}">
                                            {{ trans('cruds.city.title') }}
                                        </a>
                                    @endcan
                                    @can('area_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.areas.index') }}">
                                            {{ trans('cruds.area.title') }}
                                        </a>
                                    @endcan
                                    @can('merchant_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.merchant.title') }}
                                        </a>
                                    @endcan
                                    @can('merchant_category_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.merchant-categories.index') }}">
                                            {{ trans('cruds.merchantCategory.title') }}
                                        </a>
                                    @endcan
                                    @can('merchant_sub_category_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.merchant-sub-categories.index') }}">
                                            {{ trans('cruds.merchantSubCategory.title') }}
                                        </a>
                                    @endcan
                                    @can('merchant_management_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.merchant-managements.index') }}">
                                            {{ trans('cruds.merchantManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('merchant_level_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.merchant-levels.index') }}">
                                            {{ trans('cruds.merchantLevel.title') }}
                                        </a>
                                    @endcan
                                    @can('user_alert_access')
                                        <a class="dropdown-item" href="{{ route('frontend.user-alerts.index') }}">
                                            {{ trans('cruds.userAlert.title') }}
                                        </a>
                                    @endcan
                                    @can('item_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.item.title') }}
                                        </a>
                                    @endcan
                                    @can('item_catrgory_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.item-catrgories.index') }}">
                                            {{ trans('cruds.itemCatrgory.title') }}
                                        </a>
                                    @endcan
                                    @can('item_sub_cateogry_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.item-sub-cateogries.index') }}">
                                            {{ trans('cruds.itemSubCateogry.title') }}
                                        </a>
                                    @endcan
                                    @can('item_management_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.item-managements.index') }}">
                                            {{ trans('cruds.itemManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('order_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.order.title') }}
                                        </a>
                                    @endcan
                                    @can('order_management_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.order-managements.index') }}">
                                            {{ trans('cruds.orderManagement.title') }}
                                        </a>
                                    @endcan
                                    @can('order_status_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.order-statuses.index') }}">
                                            {{ trans('cruds.orderStatus.title') }}
                                        </a>
                                    @endcan
                                    @can('order_item_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.order-items.index') }}">
                                            {{ trans('cruds.orderItem.title') }}
                                        </a>
                                    @endcan
                                    @can('voucher_managment_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.voucherManagment.title') }}
                                        </a>
                                    @endcan
                                    @can('add_voucher_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.add-vouchers.index') }}">
                                            {{ trans('cruds.addVoucher.title') }}
                                        </a>
                                    @endcan
                                    @can('payment_method_access')
                                        <a class="dropdown-item" href="{{ route('frontend.payment-methods.index') }}">
                                            {{ trans('cruds.paymentMethod.title') }}
                                        </a>
                                    @endcan
                                    @can('add_on_access')
                                        <a class="dropdown-item disabled" href="#">
                                            {{ trans('cruds.addOn.title') }}
                                        </a>
                                    @endcan
                                    @can('add_on_category_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.add-on-categories.index') }}">
                                            {{ trans('cruds.addOnCategory.title') }}
                                        </a>
                                    @endcan
                                    @can('add_on_management_access')
                                        <a class="dropdown-item ml-3" href="{{ route('frontend.add-on-managements.index') }}">
                                            {{ trans('cruds.addOnManagement.title') }}
                                        </a>
                                    @endcan

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @if(session('message'))
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-success" role="alert">{{ session('message') }}</div>
                        </div>
                    </div>
                </div>
            @endif
            @if($errors->count() > 0)
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-danger">
                                <ul class="list-unstyled mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @yield('content')
        </main>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.perfect-scrollbar/1.5.0/perfect-scrollbar.min.js"></script>
<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
<script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
<script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
<script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/16.0.0/classic/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
<script src="{{ asset('js/main.js') }}"></script>
@yield('scripts')

</html>