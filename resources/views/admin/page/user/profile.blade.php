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

@section('title', 'پروفایل')

@section('content')
<section class="app-user-view-account">
    <div class="row">
      <!-- User Sidebar -->
      <div class="col-xl-4 col-lg-5 col-md-5 order-1 order-md-0">
        <ul class="nav nav-pills mb-2">
          <li class="nav-item">
            <a class="nav-link btn-outline-primary">
              <i data-feather="user" class="font-medium-3 me-50"></i>
              <span class="fw-bold">حساب کاربری</span></a>
          </li>
        </ul>
        <!-- User Card -->
        <div class="card">
          <div class="card-body">
            <div class="user-avatar-section">
              <div class="d-flex align-items-center flex-column">
                <img class="img-fluid rounded mt-2 mb-2"
                  src="{{ asset('admin-assets/app-assets/images/portrait/small/avatar-s-0.jpg') }}" height="110" width="110"
                  alt="User avatar" />
                <div class="user-info text-center">
                  <h4>امیررضا رضایی</h4>
                  <span class="badge bg-light-secondary">مدیر</span>
                </div>
              </div>
            </div>
            <form action="#">
              <div class="info-container mt-2">
                <ul class="list-unstyled">
                  <li class="mb-75">
                    <div class="form-group">
                      <label for="name" class="fw-bolder me-25 ">نام کاربری :</label>
                        <div class="input-group input-group-merge mt-1">
                            <span class="input-group-text"><i data-feather='user'></i></span>
                            <input type="text" id="name" class="form-control" name="fname-icon" placeholder="First Name" value="امیررضا">
                        </div>
                    </div>
                  </li>
                  <li class="mb-75">
                    <div class="form-group">
                      <label for="email" class="fw-bolder me-25 ">ایمیل :</label>
                      <div class="input-group input-group-merge mt-1">
                          <span class="input-group-text"><i data-feather='mail'></i></span>
                          <input type="email" id="email" class="form-control" name="email" placeholder="Email Adress" value="hjrezi1999@gmail.com">
                      </div>
                    </div>
                  </li>
                </ul>
                <div class="d-flex justify-content-center pt-2">
                  <button class="btn btn-primary me-1">ویرایش</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /User Card -->
      </div>
      <!--/ User Sidebar -->

      <!-- User Content -->
      <div class="col-xl-4 col-lg-7 col-md-7 order-2 order-md-1">
        <!-- User Pills -->
        <ul class="nav nav-pills mb-2">
          <li class="nav-item">
            <a class="nav-link btn-outline-primary">
              <i data-feather="lock" class="font-medium-3 me-50"></i>
              <span class="fw-bold">امنیت</span>
            </a>
          </li>
        </ul>
        <!--/ User Pills -->
        <!-- Activity Timeline -->
        <div class="card">
          <div class="card-body pt-1">
            <form action="#">
              <div class="info-container ">
                <div class="mb-1 row">
                  <div class="col-sm-4">
                      <label class="col-form-label" for="pass-icon">رمز عبور کنونی</label>
                  </div>
                  <div class="col-sm-8">
                      <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather='lock'></i></span>
                        <input type="password" id="pass-icon" class="form-control" name="contact-icon" placeholder="Password">
                      </div>
                  </div>
                </div>
                <div class="mb-1 row">
                  <div class="col-sm-4">
                      <label class="col-form-label" for="pass-icon"> رمز عبور جدید</label>
                  </div>
                  <div class="col-sm-8">
                      <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather='lock'></i></span>
                        <input type="password" id="pass-icon" class="form-control" name="contact-icon" placeholder="Password">
                      </div>
                  </div>
                </div>
                <div class="mb-1 row">
                  <div class="col-sm-4">
                      <label class="col-form-label" for="pass-icon"> تکرار رمز عبور جدید</label>
                  </div>
                  <div class="col-sm-8">
                      <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather='lock'></i></span>
                        <input type="password" id="pass-icon" class="form-control" name="contact-icon" placeholder="Password">
                      </div>
                  </div>
                </div>
                <div class="d-flex justify-content-center">
                  <button class="btn btn-primary me-1">ویرایش رمز عبور</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /Activity Timeline -->
      </div>
      <!--/ User Content -->

      <!-- User Content -->
      <div class="col-xl-4 col-lg-7 col-md-7 order-3 order-md-2">
        <!-- User Pills -->
        <ul class="nav nav-pills mb-2">
          <li class="nav-item">
            <a class="nav-link btn-outline-primary">
              <i data-feather='key'></i>
              <span class="fw-bold">تایید دو مرحله ای</span>
            </a>
          </li>
        </ul>
        <!--/ User Pills -->
        <!-- Activity Timeline -->
        <div class="card">
          <div class="card-body pt-1">
            <form action="#">
              <div class="info-container ">
                {{-- <div class="mb-1 row">
                  <div class="col-sm-4">
                      <label class="col-form-label" for="pass-icon">رمز عبور کنونی</label>
                  </div>
                  <div class="col-sm-8">
                      <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather='lock'></i></span>
                        <input type="password" id="pass-icon" class="form-control" name="contact-icon" placeholder="Password">
                      </div>
                  </div>
                </div>  --}}
                <div class="d-flex justify-content-center">
                  <button class="btn btn-primary me-1">فعالسازی</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /Activity Timeline -->
      </div>
      <!--/ User Content -->
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
