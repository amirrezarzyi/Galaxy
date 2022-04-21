@extends('admin.layouts.app')

@section('styles')
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/vendors/css/vendors-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css-rtl/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css-rtl/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css-rtl/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css-rtl/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css-rtl/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css-rtl/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css-rtl/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin-assets/app-assets/css-rtl/plugins/forms/form-validation.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css-rtl/custom-rtl.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/css/style-rtl.css') }}">
    <!-- END: Custom CSS-->
@endsection

@section('title', 'کاربران')
@section('title-h2', 'کاربران')
@section('title-li')
    <li class="breadcrumb-item">لیست کاربران </li>
@endsection
@section('content')
<section class="app-user-list">
    <div class="row">
       <div class="col-lg-3 col-sm-6">
          <div class="card">
             <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                   <h3 class="fw-bolder mb-75">{{$count_users}}</h3>
                   <span>مجموع کاربران </span>
                </div>
                <div class="avatar bg-light-primary p-50">
                   <span class="avatar-content">
                   <i data-feather="user" class="font-medium-4"></i>
                   </span>
                </div>
             </div>
          </div>
       </div>
       <div class="col-lg-3 col-sm-6">
          <div class="card">
             <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                   <h3 class="fw-bolder mb-75">4,567</h3>
                   <span>کاربران غیرفعال</span>
                </div>
                <div class="avatar bg-light-danger p-50">
                   <span class="avatar-content">
                   <i data-feather="user-plus" class="font-medium-4"></i>
                   </span>
                </div>
             </div>
          </div>
       </div>
       <div class="col-lg-3 col-sm-6">
          <div class="card">
             <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                   <h3 class="fw-bolder mb-75">19,860</h3>
                   <span>کاربران فعال</span>
                </div>
                <div class="avatar bg-light-success p-50">
                   <span class="avatar-content">
                   <i data-feather="user-check" class="font-medium-4"></i>
                   </span>
                </div>
             </div>
          </div>
       </div>
       <div class="col-lg-3 col-sm-6">
          <div class="card">
             <div class="card-body d-flex align-items-center justify-content-between">
                <div>
                   <h3 class="fw-bolder mb-75">23</h3>
                   <span>مدیران</span>
                </div>
                <div class="avatar bg-light-warning p-50">
                   <span class="avatar-content">
                   <i data-feather="user-x" class="font-medium-4"></i>
                   </span>
                </div>
             </div>
          </div>
       </div>
    </div>

    <!-- list and filter start -->
    <div class="card">
       <div class="row" id="basic-table">
          <div class="col-12">
             <div class="card">
                <div
                   class="d-flex justify-content-between align-items-center header-actions text-nowrap mx-1 row mt-75">
                   <div class="col-sm-12 col-lg-4 d-flex justify-content-center justify-content-lg-start">
                      <div class="dt-buttons btn-group flex-wrap">
                         <a class="btn add-new btn-primary mt-50" href="{{ route('admin.user.create') }}"><i
                            data-feather='user-plus'></i> <span>ایجاد کاربر</span></a>
                      </div>
                   </div>
                   <div class="col-sm-12 col-lg-8"> </div>
                </div>
                <div class="table-responsive p-2">
                   <table class="table mt-2" id="empTable">
                      <thead>
                         <tr>
                            <th>#</th>
                            <th>نام و نام خانوادگی</th>
                            <th>ایمیل</th>
                            <th>نقش</th>
                            <th>تاریخ ثبت</th>
                            <th>اقدامات</th>
                         </tr>
                      </thead>
                   </table>
                </div>
             </div>
          </div>
       </div>
    </div>
    <!-- list and filter end -->
 </section>
@endsection

@section('scripts')
    <!-- BEGIN: Vendor JS-->
    <script src="{{ asset('admin-assets/app-assets/vendors/js/vendors.min.js') }}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('admin-assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}">
    </script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}">
    </script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/tables/datatable/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}">
    </script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('admin-assets/app-assets/js/core/app-menu.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/js/core/app.js') }}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{ asset('admin-assets/app-assets/js/scripts/pages/modal-add-role.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/js/scripts/pages/app-access-roles.js') }}"></script>
    <!-- END: Page JS-->


    <script type="text/javascript">
        $(document).ready(function(){
            // DataTable
            $('#empTable').DataTable({
            "oLanguage": {
                "sUrl": "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Persian.json"
            },
                pageLength: 10,
                processing: true,
                serverSide: true,
                ajax: "{{route('admin.user.getUsers')}}",
                columns: [
                { data: 'id' },
                { data: 'name' },
                { data: 'email' },
                { data: 'role' },
                { data: 'created_at' },
                { data: 'dropdown' },
                ],
            });
        });
    </script>
@endsection
