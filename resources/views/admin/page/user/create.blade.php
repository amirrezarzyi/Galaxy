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
@section('title', '??????????????')
@section('title-h2', '??????????????')
@section('title-li')
    <li class="breadcrumb-item"><a href="{{ route('admin.user.index') }}">???????? ??????????????</a> </li>
    <li class="breadcrumb-item">?????????? ??????????</li>
@endsection
@section('content')
<section class="vertical-wizard">
    <div class="bs-stepper vertical vertical-wizard-example">
        <div class="bs-stepper-header">
            <div class="step" data-target="#account-details-vertical" role="tab" id="account-details-vertical-trigger">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-box">1</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">???????? ????????????</span>
                        <span class="bs-stepper-subtitle">?????????? ???????????? ???????? </span>
                    </span>
                </button>
            </div>
            <div class="step" data-target="#personal-info-vertical" role="tab" id="personal-info-vertical-trigger">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-box">2</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">?????????????? ???????? </span>
                        <span class="bs-stepper-subtitle">?????????????? ???????? ???? ?????????? ???????? </span>
                    </span>
                </button>
            </div>
            <div class="step" data-target="#address-step-vertical" role="tab" id="address-step-vertical-trigger">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-box">3</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">????????</span>
                        <span class="bs-stepper-subtitle">?????????? ???????? ????????</span>
                    </span>
                </button>
            </div>
            <div class="step" data-target="#role-step-vertical" role="tab" id="role-step-vertical-trigger">
                <button type="button" class="step-trigger">
                    <span class="bs-stepper-box">4</span>
                    <span class="bs-stepper-label">
                        <span class="bs-stepper-title">?????? ???? ???????????? ????</span>
                        <span class="bs-stepper-subtitle">?????????? ???????? ???????????? ???? ???? ??????????</span>
                    </span>
                </button>
            </div>
        </div>
        <div class="bs-stepper-content">
        <form action="{{ route('admin.user.store') }}" method="POST">
            @csrf
            <div id="account-details-vertical" class="content" role="tabpanel" aria-labelledby="account-details-vertical-trigger">
                <div class="content-header">
                    <h5 class="mb-0">???????????? ???????? </h5>
                    <small class="text-muted">???????????? ???????? ?????? ???? ???????? ???????? </small>
                </div>
                <div class="row">
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="name">?????? ????????????</label>
                        <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"placeholder="?????? ??????????" />
                        <span class="error">@error('name') {{$message}} @enderror</span>
                    </div>
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="email">??????????</label>
                        <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"placeholder="aliamiri@email.com" aria-label="john.doe" />
                        <span class="error">@error('email') {{$message}} @enderror</span>
                    </div>
                </div>
                <div class="row">
                    <div class="mb-1 form-password-toggle col-md-6">
                        <label class="form-label" for="password">??????????????</label>
                        <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                        <span class="error">@error('password') {{$message}} @enderror</span>
                    </div>
                    <div class="mb-1 form-password-toggle col-md-6">
                        <label class="form-label" for="password_confirmation">?????????? ??????????????</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" class="form-control @error('password') is-invalid @enderror" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" />
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button class="btn btn-outline-secondary btn-prev" disabled>
                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">????????</span>
                    </button>
                    <button  type="button" class="btn btn-primary btn-next">
                        <span class="align-middle d-sm-inline-block d-none">????????</span>
                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                    </button>
                </div>
            </div>
            <div id="personal-info-vertical" class="content" role="tabpanel" aria-labelledby="personal-info-vertical-trigger">
                <div class="content-header">
                    <h5 class="mb-0">?????????????? ????????</h5>
                    <small class="text-muted">?????????????? ???????? ?????? ???? ???????? ???????? </small>
                </div>
                <div class="row">
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="vertical-first-name">??????</label>
                        <input type="text" id="vertical-first-name" class="form-control" placeholder="??????" />
                    </div>
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="vertical-last-name">?????? ????????????????</label>
                        <input type="text" id="vertical-last-name" class="form-control" placeholder="??????????" />
                    </div>
                </div>
                <div class="row">
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="vertical-country">????????</label>
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
                        <label class="form-label" for="vertical-language">????????</label>
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
                        <span class="align-middle d-sm-inline-block d-none">????????</span>
                    </button>
                    <button type="button" class="btn btn-primary btn-next">
                        <span class="align-middle d-sm-inline-block d-none">????????</span>
                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                    </button>
                </div>
            </div>
            <div id="address-step-vertical" class="content" role="tabpanel" aria-labelledby="address-step-vertical-trigger">
                <div class="content-header">
                    <h5 class="mb-0">????????</h5>
                    <small class="text-muted">???????? ?????? ???? ???????? ????????</small>
                </div>
                <div class="row">
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="vertical-address">????????</label>
                        <input type="text" id="vertical-address" class="form-control" placeholder="?????????? ???????????? ???????????? ???? 82 ???????? 30" />
                    </div>
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="vertical-landmark">??????????</label>
                        <input type="text" id="vertical-landmark" class="form-control" placeholder="???????????? ??????????" />
                    </div>
                </div>
                <div class="row">
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="pincode2">????????????</label>
                        <input type="text" id="pincode2" class="form-control" placeholder="123456789" />
                    </div>
                    <div class="mb-1 col-md-6">
                        <label class="form-label" for="city2">??????</label>
                        <input type="text" id="city2" class="form-control" placeholder="????????????" />
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <button type="button" class="btn btn-primary btn-prev">
                        <i data-feather="arrow-left" class="align-middle me-sm-25 me-0"></i>
                        <span class="align-middle d-sm-inline-block d-none">????????</span>
                    </button>
                    <button type="button" class="btn btn-primary btn-next">
                        <span class="align-middle d-sm-inline-block d-none">????????</span>
                        <i data-feather="arrow-right" class="align-middle ms-sm-25 ms-0"></i>
                    </button>
                </div>
            </div>
            <div id="role-step-vertical" class="content" role="tabpanel" aria-labelledby="role-step-vertical-trigger">
                <div class="content-header">
                    <h5 class="mb-0">?????? ???? ?? ?????????? ????</h5>
                    <small class="text-muted">?????? ???????? ???? ??????????</small>
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
                        <span class="align-middle d-sm-inline-block d-none">????????</span>
                    </button>
                    <button type="submit" class="btn btn-success">??????</button>
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
