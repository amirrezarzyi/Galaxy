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
    <li class="breadcrumb-item">لیست کاربران </li>
@endsection
@section('content')
<section class="app-user-list">
    <!-- list and filter start -->
    <div class="card">
       <div class="row" id="basic-table">
          <div class="col-12">
             <div class="card">
                <div class="d-flex justify-content-between align-items-center header-actions text-nowrap mx-1 row mt-75">
                   <div class="col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start">
                      <div class="dt-buttons btn-group flex-wrap">
                         <button type="button" class="btn btn-primary waves-effect mt-1" data-bs-toggle="modal" data-bs-target="#exampleModalCenter">
                         ایجاد دسترسی
                         </button>
                      </div>
                   </div>
                   <div class="col-sm-12 col-lg-8"> </div>
                </div>
                <div class="table-responsive p-2">
                   <table class="table mt-2">
                      <thead>
                         <tr>
                            <th>#</th>
                            <th>نام دسترسی</th>
                            <th>اقدامات</th>
                         </tr>
                      </thead>
                      <tbody>
                         {{-- @foreach ($permissions as $permission) --}}
                         <tr>
                            {{--
                            <td>{{ $loop->iteration }}</td>
                            --}}
                            {{--
                            <td>{{$permission->name}}</td>
                            --}}
                            <td>
                               <div class="dropdown">
                                  <button type="button"
                                     class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light"
                                     data-bs-toggle="dropdown">
                                  <i data-feather='more-vertical'></i>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-end">
                                     <a class="dropdown-item" href="#">
                                     <i data-feather='edit-2'></i>
                                     <span>ویرایش</span>
                                     </a>
                                     <a class="dropdown-item" href="#">
                                     <i data-feather='trash'></i>
                                     <span>حذف</span>
                                     </a>
                                  </div>
                               </div>
                            </td>
                         </tr>
                         {{-- @endforeach --}}
                      </tbody>
                   </table>
                   <div class="mt-4">
                      {{-- {{$permissions->links()}} --}}
                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- list and filter end -->
 </section>
 <!-- Modal -->
 <div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
       <div class="modal-content">
          <div class="modal-header bg-transparent">
             <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body px-5 pb-5">
             <div class="text-center mb-4">
                <h1>ایجاد دسترسی  جدید</h1>
             </div>
             <!-- Add role form -->
             <form id="addRoleForm" class="row" onsubmit="return true">
                <div class="col-12">
                   <label class="form-label" for="modalRoleName">نام دسترسی</label>
                   <input type="text" id="modalRoleName" name="modalRoleName" class="form-control" placeholder="نام دسترسی را وارد کنید" tabindex="-1" data-msg="نام نقش را وارد کنید" />
                </div>
                <div class="col-12 text-center mt-2">
                   <button type="submit" class="btn btn-primary me-1">ذخیره</button>
                   <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                   انصراف
                   </button>
                </div>
             </form>
             <!--/ Add role form -->
          </div>
       </div>
    </div>
 </div>
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
    <script src="{{asset('admin-assets/app-assets/js/scripts/pages/modal-add-role.js')}}"></script>
    <script src="{{asset('admin-assets/app-assets/js/scripts/pages/app-access-roles.js')}}"></script>
    <!-- END: Page JS-->
@endsection
