@extends('admin.layouts.app')
@section('styles')

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin-assets/app-assets/vendors/css/vendors-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin-assets/app-assets/vendors/css/forms/wizard/bs-stepper.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin-assets/app-assets/vendors/css/forms/select/select2.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin-assets/app-assets/css-rtl/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin-assets/app-assets/css-rtl/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin-assets/app-assets/css-rtl/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin-assets/app-assets/css-rtl/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin-assets/app-assets/css-rtl/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin-assets/app-assets/css-rtl/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin-assets/app-assets/css-rtl/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css-rtl/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('admin-assets/app-assets/css-rtl/plugins/forms/form-wizard.css')}}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin-assets/app-assets/css-rtl/custom-rtl.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin-assets/assets/css/style-rtl.css') }}">
    <!-- END: Custom CSS-->
@endsection
@section('title', 'کاربران')
@section('title-h2', 'کاربران')
@section('title-li')
    <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">لیست کاربران</a> </li>
    <li class="breadcrumb-item">ایجاد کاربر</li>
@endsection
@section('content')
<section class="vertical-wizard">
    <div class="bs-stepper vertical vertical-wizard-example">
        <div class="bs-stepper-header">
            <div class="step" data-target="#account-details-vertical" role="tab" id="account-details-vertical-trigger">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-box">1</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">حساب کاربری</span>
                        <span class="bs-stepper-subtitle">تنظیم جزئیات حساب </span>
                    </span>
                </button>
            </div>
            <div class="step" data-target="#personal-info-vertical" role="tab" id="personal-info-vertical-trigger">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-box">2</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">اطلاعات شخصی </span>
                        <span class="bs-stepper-subtitle">اطلاعات شخصی را اضافه کنید </span>
                    </span>
                </button>
            </div>
            <div class="step" data-target="#address-step-vertical" role="tab" id="address-step-vertical-trigger">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-box">3</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">آدرس</span>
                        <span class="bs-stepper-subtitle">اضافه کردن آدرس</span>
                    </span>
                </button>
            </div>
            <div class="step" data-target="#role-step-vertical" role="tab" id="role-step-vertical-trigger">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-box">4</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">نقش ها وسترسی ها</span>
                        <span class="bs-stepper-subtitle">اضافه کردن دسترسی ها به کاربر</span>
                    </span>
                </button>
            </div>
        </div>
        <div class="bs-stepper-content">
        <form action="{{ route('admin.user.store') }}" method="POST">
            @csrf
            <div id="account-details-vertical" class="content" role="tabpanel" aria-labelledby="account-details-vertical-trigger">
                <div class="content-header">
                    <h5 class="mb-0">جزئیات حساب </h5>
                    <small class="text-muted">جزئیات حساب خود را وارد کنید </small>
                </div>
                <div class="row">
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="name">نام کاربری</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"placeholder="علی امیری" />
                        <span class="error">@error('name') {{$message}} @enderror</span>
                    </div>
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="email">ایمیل</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"placeholder="aliamiri@email.com" aria-label="john.doe" />
                        <span class="error">@error('email') {{$message}} @enderror</span>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-1 form-password-toggle col-md-6">
                        <label class="form-label" for="password">رمزعبور</label>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        <span class="error">@error('password') {{$message}} @enderror</span>
                    </div>
                    <div class="mb-1 form-password-toggle col-md-6">
                        <label class="form-label" for="password_confirmation">تایید رمزعبور</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-outline-secondary btn-prev" disabled>
                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">قبلی</span>
                    </button>
                    <button  type="button" class="btn btn-primary btn-next">
                        <span class="align-middle d-sm-inline-block d-none">بعدی</span>
                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                    </button>
                </div>
            </div>
            <div id="personal-info-vertical" class="content" role="tabpanel" aria-labelledby="personal-info-vertical-trigger">
                <div class="content-header">
                    <h5 class="mb-0">اطلاعات شخصی</h5>
                    <small class="text-muted">اطلاعات شخصی خود را وارد کنید </small>
                </div>
                <div class="row">
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="vertical-first-name">نام</label>
                        <input type="text" id="vertical-first-name" class="form-control" placeholder="علی" />
                    </div>
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="vertical-last-name">نام خانوادگی</label>
                        <input type="text" id="vertical-last-name" class="form-control" placeholder="امیری" />
                    </div>
                </div>
                <div class="row">
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="vertical-country">کشور</label>
                        <select class="select2 w-100" id="vertical-country">
                            <option label=" "></option>
                            <option>UK</option>
                            <option>USA</option>
                            <option>Spain</option>
                            <option>France</option>
                            <option>Italy</option>
                            <option>Australia</option>
                        </select>
                    </div>
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="vertical-language">زبان</label>
                        <select class="select2 w-100" id="vertical-language" multiple>
                            <option>English</option>
                            <option>French</option>
                            <option>Spanish</option>
                        </select>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-primary btn-prev">
                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">قبلی</span>
                    </button>
                    <button type="button" class="btn btn-primary btn-next">
                        <span class="align-middle d-sm-inline-block d-none">بعدی</span>
                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                    </button>
                </div>
            </div>
            <div id="address-step-vertical" class="content" role="tabpanel" aria-labelledby="address-step-vertical-trigger">
                <div class="content-header">
                    <h5 class="mb-0">آدرس</h5>
                    <small class="text-muted">آدرس خود را وارد کنید</small>
                </div>
                <div class="row">
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="vertical-address">آدرس</label>
                        <input type="text" id="vertical-address" class="form-control" placeholder="بلوار زمستان خیابان دی 82 پلاک 30" />
                    </div>
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="vertical-landmark">استان</label>
                        <input type="text" id="vertical-landmark" class="form-control" placeholder="خراسان جنوبی" />
                    </div>
                </div>
                <div class="row">
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="pincode2">کدپستی</label>
                        <input type="text" id="pincode2" class="form-control" placeholder="123456789" />
                    </div>
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="city2">شهر</label>
                        <input type="text" id="city2" class="form-control" placeholder="بیرحند" />
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-primary btn-prev">
                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">قبلی</span>
                    </button>
                    <button type="button" class="btn btn-primary btn-next">
                        <span class="align-middle d-sm-inline-block d-none">بعدی</span>
                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                    </button>
                </div>
            </div>
            <div id="role-step-vertical" class="content" role="tabpanel" aria-labelledby="role-step-vertical-trigger">
                <div class="content-header">
                    <h5 class="mb-0">نقش ها و سترسی ها</h5>
                    <small class="text-muted">نقش دادن به کاربر</small>
                </div>
                <div class="row">
                    <div class="list-group">
                        @foreach ($roles as $role)
                                <label for="{{ $role->id }}">
                                <li class="list-group-item list-group-item-action me-3">
                                    <input class="form-check-input me-1" type="checkbox" name="roles[]"
                                     value="{{$role->id}}" id="{{ $role->id }}"/>

                                <label for="{{ $role->id }}">{{ $role->name }}</label>
                                </li>
                                </label>
                        @endforeach
                     </div><span class="error">@error('roles') {{$message}} @enderror</span>
                </div>
                <div class="d-flex justify-content-between mt-2">
                    <button type="button" class="btn btn-primary btn-prev">
                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">قبلی</span>
                    </button>
                    <button type="submit" class="btn btn-success">ثبت</button>
                </div>
            </div>
        </form>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('admin-assets/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('admin-assets/app-assets/vendors/js/forms/wizard/bs-stepper.min.js')}}"></script>
    <script src="{{asset('admin-assets/app-assets/vendors/js/forms/select/select2.full.min.js')}}"></script>
    <script src="{{asset('admin-assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('admin-assets/app-assets/js/core/app-menu.js')}}"></script>
    <script src="{{asset('admin-assets/app-assets/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('admin-assets/app-assets/js/scripts/forms/form-wizard.js')}}"></script>
    <!-- END: Page JS-->
@endsection
