@extends('admin.layouts.app')

@section('styles')

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/vendors/css/vendors-rtl.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css') }}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css-rtl/bootstrap.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css-rtl/bootstrap-extended.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css-rtl/colors.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css-rtl/components.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css-rtl/themes/dark-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css-rtl/themes/bordered-layout.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css-rtl/themes/semi-dark-layout.css') }}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css-rtl/core/menu/menu-types/vertical-menu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css-rtl/plugins/forms/form-validation.css') }}">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/app-assets/css-rtl/custom-rtl.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin-assets/assets/css/style-rtl.css') }}">
    <!-- END: Custom CSS-->
@endsection
@section('title', 'نقش ها')
@section('title-h2', 'نقش ها وسترسی ها')
@section('title-li')
    <li class="breadcrumb-item">نقش ها </li>
@endsection
@section('content')
<!-- Role cards -->
<div class="row">
    <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="card">
            <div class="row">
                <div class="col-sm-5">
                    <div class="d-flex align-items-end justify-content-center h-100">
                        <img src="{{ asset('/admin-assets/app-assets/images/illustration/faq-illustrations.svg') }}" class="img-fluid mt-2" alt="Image" width="85">
                    </div>
                </div>
                <div class="col-sm-7">
                    <div class="card-body text-sm-end text-center ps-sm-0">
                        <a href="javascript:void(0)" data-bs-target="#addRoleModal" data-bs-toggle="modal" class="stretched-link text-nowrap add-new-role">
                            <span class="btn btn-primary mb-1 waves-effect waves-float waves-light">ایجاد نقش جدید</span>
                        </a>
                        <p class="mb-0">نقش جدیدی, را ایجاد کنید</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-lg-6 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <span>مجموعا 4 کاربر </span>
                    <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="" class="avatar avatar-sm pull-up" data-bs-original-title="Vinnie Mostowy">
                            <img class="rounded-circle" src="{{ asset('/admin-assets/app-assets/images/avatars/6.png') }}" alt="Avatar">
                        </li>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="" class="avatar avatar-sm pull-up" data-bs-original-title="Allen Rieske">
                            <img class="rounded-circle" src="{{ asset('/admin-assets/app-assets/images/avatars/3.png') }}" alt="Avatar">
                        </li>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="" class="avatar avatar-sm pull-up" data-bs-original-title="Julee Rossignol">
                            <img class="rounded-circle" src="{{ asset('/admin-assets/app-assets/images/avatars/6.png') }}" alt="Avatar">
                        </li>
                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="" class="avatar avatar-sm pull-up" data-bs-original-title="Kaith D'souza">
                            <img class="rounded-circle" src="{{ asset('/admin-assets/app-assets/images/avatars/11.png') }}" alt="Avatar">
                        </li>
                    </ul>
                </div>
                <div class="d-flex justify-content-between align-items-end mt-1 pt-25">
                    <div class="role-heading">
                        <h4 class="fw-bolder">سوپر ادمین <i data-feather='edit'></i></h4>
                        <a href="javascript:;" class="role-edit-modal" data-bs-toggle="modal" data-bs-target="#addRoleModal">
                            <small class="fw-bolder">ویرایش دسترسی های نقش <i data-feather='edit'></i></small>
                        </a>
                    </div>
                    <a href="" class="text-body"><i data-feather='user-plus' style="width: 20px"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--/ Role cards --> 

<!-- Add Role Modal -->
<div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
        <div class="modal-content">
            <div class="modal-header bg-transparent">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5 pb-5">
                <div class="text-center mb-4">
                    <h1>ایجاد نقش  جدید</h1>
                </div>
                <!-- Add role form -->
                <form id="addRoleForm" class="row" onsubmit="return true">
                    <div class="col-12">
                        <label class="form-label" for="modalRoleName">نام نقش</label>
                        <input type="text" id="modalRoleName" name="modalRoleName" class="form-control" placeholder="نام نقش را وارد کنید" tabindex="-1" data-msg="نام نقش را وارد کنید" />
                    </div>
                    <div class="col-12">
                        <h4 class="mt-2 pt-50">مجوزهای نقش </h4>
                        <!-- Permission table -->
                        <div class="table-responsive">
                            <table class="table table-flush-spacing">
                                <tbody>
                                    <tr>
                                        <td class="text-nowrap fw-bolder">
                                            دسترسی مدیر
                                            <span data-bs-toggle="tooltip" data-bs-placement="top" title="اجازه دسترسی کامل به سیستم را می دهد">
                                                <i data-feather="info"></i>
                                            </span>
                                        </td>
                                        <td>
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" id="selectAll" />
                                                <label class="form-check-label" for="selectAll">انتخاب همه</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="text-nowrap fw-bolder">
                                            <label class="form-check-label opacity-75" for="userManagementRead"> ساختن پست </label></td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="form-check me-3 me-lg-5">
                                                    <input class="form-check-input" type="checkbox" id="userManagementRead" />
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Permission table -->
                    </div>
                    <div class="col-12 text-center mt-2">
                        <button type="submit" class="btn btn-primary me-1">Submit</button>
                        <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close">
                            Discard
                        </button>
                    </div>
                </form>
                <!--/ Add role form -->
            </div>
        </div>
    </div>
</div>
<!--/ Add Role Modal -->

@endsection

@section('scripts')
    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('admin-assets/app-assets/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{ asset('admin-assets/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/tables/datatable/buttons.bootstrap5.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/tables/datatable/datatables.checkboxes.min.js') }}"></script>
    <script src="{{ asset('admin-assets/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
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
