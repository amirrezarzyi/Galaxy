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
      <!-- Profile Card -->
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
          <div class="card-body"><label for="name" class="fw-bolder me-25 ">تصویر پروفایل:</label>
            <div class="d-flex mt-1">
                <a href="#" class="me-25">
                    <img src="{{ asset('admin-assets/app-assets/images/portrait/small/avatar-s-0.jpg') }}" id="account-upload-img" class="uploadedAvatar rounded me-50" alt="profile image" height="100" width="100">
                </a>
                <!-- upload and reset button -->
                <div class="d-flex align-items-end mt-75 ms-1">
                    <div>
                        <label for="account-upload" class="btn btn-sm btn-primary mb-75 me-75 waves-effect waves-float waves-light">بارگذاری</label>
                        <input type="file" id="account-upload" hidden="" accept="image/*">
                        <button type="button" id="account-reset" class="btn btn-sm btn-outline-secondary mb-75 waves-effect">بازنشانی </button>
                        <p class="mb-0">فایل های مجاز: png، jpg، jpeg.</p>
                    </div>
                </div>
                <!--/ upload and reset button -->
            </div>
            <form method="POST" action="{{ route('user-profile-information.update') }}">
                @csrf
                @method('PUT')
              <div class="info-container mt-3">
                <ul class="list-unstyled">
                  <li class="mb-75">
                    <div class="form-group">
                      <label for="name" class="fw-bolder me-25 ">نام کاربری :</label>
                        <div class="input-group input-group-merge mt-1">
                            <span class="input-group-text"><i data-feather='user'></i></span>
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="First Name" value="{{ old('name') ?? auth()->user()->name  }}">
                       </div>
                       <span class="error">@error('name') {{$message}} @enderror</span>
                    </div>
                  </li>
                  <li class="mb-75">
                    <div class="form-group">
                      <label for="email" class="fw-bolder me-25 ">ایمیل :</label>
                      <div class="input-group input-group-merge mt-1">
                          <span class="input-group-text"><i data-feather='mail'></i></span>
                          <input type="name" id="email" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email Adress"  value="{{ old('email') ?? auth()->user()->email  }}" readonly>
                    </div>
                    <span class="error">@error('email') {{$message}} @enderror</span>
                    </div>
                  </li>
                </ul>
                <div class="d-flex justify-content-center pt-2">
                  <button type="submit" class="btn btn-primary me-1">ویرایش</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /User Card -->
      </div>
      <!--/ Profile Card -->

      <!-- Security card -->
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
            <form method="post" action="{{ route('user-password.update') }}">
                @csrf
                @method('PUT')
              <div class="info-container ">
                <div class="mb-1 row">
                  <div class="col-sm-4">
                      <label class="col-form-label" for="current_password">رمز عبور کنونی</label>
                  </div>
                  <div class="col-sm-8">
                      <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather='lock'></i></span>
                        <input type="password" id="current_password" class="form-control" name="current_password" placeholder="Current password">
                    </div>
                    <span class="error">@error('current_password' , 'updatePassword') {{$message}} @enderror</span>
                  </div>
                </div>
                <div class="mb-1 row">
                  <div class="col-sm-4">
                      <label class="col-form-label" for="password"> رمز عبور جدید</label>
                  </div>
                  <div class="col-sm-8">
                      <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather='lock'></i></span>
                        <input type="password" id="password" class="form-control" name="password" placeholder="New Password">
                      </div>
                      <span class="error">@error('password', 'updatePassword') {{$message}} @enderror</span>
                  </div>
                </div>
                <div class="mb-1 row">
                  <div class="col-sm-4">
                      <label class="col-form-label" for="password_confirmation"> تکرار رمز عبور جدید</label>
                  </div>
                  <div class="col-sm-8">
                      <div class="input-group input-group-merge">
                        <span class="input-group-text"><i data-feather='lock'></i></span>
                        <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Retype New Password">
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
      <!--/ Security card -->

      <!-- Two factor chalange -->
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
            <form method="post" action="{{ route('two-factor.enable') }}">
                @csrf
                <div class="col-md-12 text-center">
                   @if (auth()->user()->two_factor_secret)
                   <div class="card text-center">
                    <div class="card-header py-2">
                        <ul class="nav nav-pills card-header-pills ms-0" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Qr Code</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">کد بازیابی</a>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade active show bg-light p-2"  id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                                <p class="text-white bg-primary p-1"> QR code   را در  Google Authenticator اسکن کنید</p>
                                     {!! auth()->user()->twoFactorQrCodeSvg() !!}
                            </div>
                            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                <p class="text-white bg-dark"> کدهای بازیابی زیر را در جایی امن نگهداری کنید</p>
                                <ul class="list-group list-group-flush">
                                    @foreach (json_decode(decrypt(auth()->user()->two_factor_recovery_codes)) as $code)
                                    <li class="list-group-item">{{ $code }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    @method('DELETE')
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-outline-danger">غیرفعال کردن</button>
                    </div>
                </div>
                   @else
                   <p>حساب شما دو مرحله ای نمی باشد</p>
                    <div class="d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary">فعالسازی</button>
                    </div>
                   @endif
                </div>
              <div class="info-container ">
                <div class="mb-1 row">

                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- /Activity Timeline -->
      </div>
      <!--/ Two factor chalange -->

      <!-- all Sessions -->
      <div class="col-xl-12 col-lg-12 col-md-12 order-4 order-md-3">
        <!-- User Pills -->
        <ul class="nav nav-pills mb-2">
          <li class="nav-item">
            <a class="nav-link btn-outline-primary">
                <i data-feather='monitor'></i>
                <span class="fw-bold">نشست های فعال</span>
            </a>
          </li>
        </ul>
        <!--/ User Pills -->
        <!-- Activity Timeline -->
        <div class="card">
            <div class="card-body pt-1"
            <div class="info-container ">
               <div class="mb-1 row">
                  <div class="row gy-1">
                    @foreach ($sessions as $session)
                     @php
                     $agent->setUserAgent($session->user_agent);
                     @endphp
                     <div class="col-12 col-md-6">
                        <div class="col-12 bg-light-secondary position-relative rounded p-2">
                           <div class="d-flex align-items-center justify-content-between">
                              <h4 class="mb-1 me-1">
                                  <span>
                                      <img src="{{ asset('admin-assets/app-assets/images/icons/'.strtolower($agent->browser()).'.png') }}" class="rounded me-1" height="20" alt="Google Chrome">
                                  </span>
                                 {{$agent->platform() }}
                                 @if($agent->isMobile())    <i data-feather='smartphone'></i>@endif
                                 @if($agent->is('Windows')) <i data-feather='monitor'></i>   @endif
                                 - {{$agent->browser()}}

                            @if($session->id === request()->session()->getId())
                                 <span class="badge badge-light-success">شما</span>
                            @endif
                              </h4>
                            @unless($session->id === request()->session()->getId())
                                 <form action="{{ route('admin.user.profile.session.destroy' ,$session->user_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                                 <button type="submit" class="btn btn-outline-danger">خارج شدن</button>
                              </form>
                            @endunless
                           </div>
                           <h6 class="d-flex align-items-center fw-bolder">
                              <span class="me-50">{{ $session->ip_address }}</span>
                           </h6>
                        @if($session->id === request()->session()->getId())
                           <p class="mt-1"><span class="text-success"><i data-feather='activity'></i> آنلاین </span>  </p>
                           @else
                           <p class="mt-1">آخرین بازدید : {{ jdate($session->last_activity)->ago() }}</p>
                        @endif
                        </div>
                     </div>
                    @endforeach
                  </div>
               </div>
            </div>
         </div>
         </div>
        <!-- /Activity Timeline -->
      </div>
      <!--/ all Sessions -->
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
    <script src="{{asset('admin-assets/app-assets/js/scripts/extensions/ext-component-clipboard.js')}}"></script>
    <!-- END: Page JS-->

@endsection
