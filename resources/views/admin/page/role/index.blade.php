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
    <li class="breadcrumb-item">لیست نقش ها </li>
@endsection




@section('content')
<!--/ create role cards -->
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
</div>
<!--/ create role cards -->

<!--/ Role cards -->
<div class="row">
   @foreach ($roles as $role)
   <div class="col-xl-4 col-lg-6 col-md-6">
      <div class="card">
         <div class="card-body">
            <div class="d-flex justify-content-between">
               <span>مجموعا {{ count($role->users) }} کاربر </span>
               <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                @foreach($role->users as $profile)
                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="" class="avatar avatar-sm pull-up" data-bs-original-title="{{$profile->name}}">
                     <img class="rounded-circle" src="{{ asset('/admin-assets/app-assets/images/portrait/small/avatar-s-0.jpg') }}" alt="Avatar">
                  </li>
                @endforeach
               </ul>
            </div>
            <div class="d-flex justify-content-between align-items-end mt-1">
               <div class="role-heading">
                  <button type="button"  class="btn text-primary me-4" data-bs-toggle="modal"  data-bs-target="#editRoleModalCenter{{ $role->id }}">
                     <h4 class="fw-bolder">{{ $role->name }} <i data-feather='edit'></i></h4>
                  </button>
                  <button  class="btn text-primary me-4" data-bs-toggle="modal" data-bs-target="#addPermissionModal{{ $role->id }}">
                  <small class="fw-bolder">ویرایش دسترسی های نقش <i data-feather='edit'></i></small>
                  </button>
               </div>
               <form action="{{ route('admin.role.destroy',$role->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn" type="submit" class="text-body"><i data-feather='trash-2'></i></i></button>
               </form>
            </div>
         </div>
      </div>
   </div>
   <!--/ Role cards -->
   <!-- edit role modal -->
   <div class="modal fade" id="editRoleModalCenter{{ $role->id }}" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
         <div class="modal-content">
            <div class="modal-header bg-transparent">
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5 pb-5">
               <div class="text-center mb-4">
                  <h1>ویرایش نقش</h1>
               </div>
               <!-- Add role form -->
               <form id="addRoleForm" action="{{ route('admin.role.update',$role->id) }}" method="post" class="row" onsubmit="return true">
                  @csrf
                  @method('PUT')
                  <div class="col-12">
                     <label class="form-label" for="name">نام نقش</label>
                     <input type="text" id="name" name="name" value="{{ old('name',$role->name) }}"class="form-control" placeholder="نام دسترسی را وارد کنید" tabindex="-1" data-msg="نام نقش را وارد کنید" />
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
   <!-- edit role modal -->

   <!-- Add Permission Modal -->
   <div class="modal fade" id="addPermissionModal{{ $role->id }}" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
         <div class="modal-content">
            <div class="modal-header bg-transparent">
               <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-5 pb-5">
               <div class="text-center mb-4">
                  <h1>ویرایش دسترسی ها</h1>
                  <p>دسترسی های نقش را مشخص کنید</p>
               </div>
                <!-- Permission table -->
                <form action="{{ route('admin.role.update-permission',$role->id) }}" method="post">
                @csrf
                @method('PUT')
                <div class="table-responsive">
                <table class="table table-flush-spacing mt-2">
                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td class="text-nowrap fw-bolder">
                            <label class="form-check-label col-12 opacity-75" for="{{ $permission->id.$role->id }}">{{ $permission->name }}</label>
                            </td>
                            <td>
                            <div class="d-flex">
                                <div class="form-check me-3 me-lg-5">
                                    <input class="form-check-input" name="permission[]"
                                     type="checkbox" value="{{ $permission->id }}"
                                      id="{{ $permission->id.$role->id }}"
                                    @foreach ($role->permissions as $permissionRole)
                                       {{ $permissionRole->id === $permission->id ? 'checked' : ''}}
                                    @endforeach/>
                                </div>
                            </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
                <div class="col-12 text-center mt-2">
                    <button type="submit" class="btn btn-primary me-1">ذخیره</button>
                    <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close"> انصراف </button>
                 </div>
                </form>
                <!-- Permission table -->
            </div>
         </div>
      </div>
   </div>
   <!--/ Add Permission Modal -->
   @endforeach
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
            <form id="addRoleForm" class="row" action="{{ route('admin.role.store') }}" method="post">
               @csrf
               <div class="col-12">
                  <label class="form-label" for="name">نام نقش</label>
                  <input type="text" id="name" name="name" class="form-control" placeholder="نام نقش را وارد کنید" tabindex="-1" data-msg="نام نقش را وارد کنید" />
               </div>
               <div class="col-12">
                  <!-- Permission table -->
                  <div class="table-responsive">
                     <table class="table table-flush-spacing mt-2">
                        <tbody>
                           <tr>
                              <td class="text-nowrap fw-bolder">
                                 <label class="form-check-label col-12" for="selectAll">دسترسی مدیر</label>
                                 <span data-bs-toggle="tooltip" data-bs-placement="top" title="دسترسی کامل به سیستم">
                                 <i data-feather="info"></i>
                                 </span>
                              </td>
                              <td>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="selectAll">
                                    <label class="form-check-label" for="selectAll">انتخاب همه</label>
                                 </div>
                              </td>
                           </tr>
                           @foreach ($permissions as $permission)
                           <tr>
                              <td class="text-nowrap fw-bolder">
                                 <label class="form-check-label col-12 opacity-75" for="{{ $permission->id }}X">{{ $permission->name }}</label>
                              </td>
                              <td>
                                 <div class="d-flex">
                                    <div class="form-check me-3 me-lg-5">
                                       <input class="form-check-input" name="permissions[]" type="checkbox" value="{{ $permission->id }}" id="{{ $permission->id }}X"/>
                                    </div>
                                 </div>
                              </td>
                           </tr>
                           @endforeach
                        </tbody>
                     </table>
                  </div>
                  <!-- Permission table -->
               </div>
               <div class="col-12 text-center mt-2">
                  <button type="submit" class="btn btn-primary me-1">ذخیره</button>
                  <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal" aria-label="Close"> انصراف </button>
               </div>
            </form>
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
