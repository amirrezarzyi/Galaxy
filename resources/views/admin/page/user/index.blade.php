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
                   <h3 class="fw-bolder mb-75">{{count($users)}}</h3>
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
                   <table class="table mt-2">
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
                      <tbody>
                         @foreach ($users as $user)
                         <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                               <img src="{{ asset('admin-assets/app-assets/images/portrait/small/avatar-s-0.jpg') }}"
                                  class="me-75" height="20" width="20" alt="Angular">
                               <span class="fw-bold">{{ $user->name }}</span>
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @foreach ($user->roles as $userRole)
                                <span class="badge rounded-pill badge-light-primary me-1">{{ $userRole->name }}</span>
                                @endforeach
                            </td>

                            <td>
                                {{ jdate($user->created_at)->format('Y/m/d - H:i')}}
                            </td>
                            <td>
                               <div class="dropdown">
                                  <button type="button"
                                     class="btn btn-sm dropdown-toggle hide-arrow py-0 waves-effect waves-float waves-light"
                                     data-bs-toggle="dropdown">
                                  <i data-feather='more-vertical'></i>
                                  </button>
                                  <div class="dropdown-menu dropdown-menu-end">
                                     {{-- <a class="dropdown-item" href="#">
                                     <i data-feather='edit-2'></i>
                                     <span>ویرایش</span>
                                     </a> --}}
                                     <a class="dropdown-item" data-bs-target="#roleModalCenter{{$user->id}}"
                                        data-bs-toggle="modal">
                                     <i data-feather='shield'></i>
                                     <span>ویرایش دسترسی ها</span>
                                     </a>
                                     <form action="{{ route('admin.user.destroy',$user->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn dropdown-item" type="submit">
                                        <i data-feather='trash'></i>
                                        <span>حذف</span>
                                        </button>
                                    </form>
                                  </div>
                               </div>
                            </td>
                         </tr>
                         <div class="modal fade" id="roleModalCenter{{$user->id}}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered modal-add-new-role">
                               <div class="modal-content">
                                  <div class="modal-header bg-transparent">
                                     <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body px-5 pb-5">
                                     <div class="text-center mb-4">
                                        <h1>ویرایش نقش کاربر <small>{{$user->name}}</small></h1>
                                     </div>
                                     <!-- Add role form -->
                                     <form id="addRoleForm" action="{{ route('admin.user.set-role',$user->id) }}" method="post" class="row" onsubmit="return true">
                                        @csrf
                                        <div class="list-group">
                                           @foreach ($roles as $role)
                                           <label for="{{ $user->id.$role->id }}">
                                              <li class="list-group-item list-group-item-action me-3">
                                                 <input class="form-check-input me-1" type="checkbox" name="roles[]" value="{{$role->id}}"
                                                 id="{{ $user->id.$role->id }}"
                                                 @foreach ($user->roles as $userRole)
                                                 {{($userRole->id === $role->id ? 'checked' : '')}}
                                                 @endforeach
                                                 />
                                           <label for="{{ $user->id.$role->id }}">{{ $role->name }}</label>
                                           </li>
                                           </label>
                                           @endforeach
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
                         @endforeach
                      </tbody>
                   </table>
                   <div class="mt-4">
                      {{ $users->links() }}
                   </div>
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
